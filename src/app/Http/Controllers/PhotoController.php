<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PhotoSpotImage;

class PhotoController extends Controller
{
    public function getListPhotoUnused(){
        $ps_user_id = auth()->user()->photo_spot_user_id;
        $all_grouped_photo_lists = \PsApi::GetPsPhotoLists($ps_user_id);

        $grouped_unused_photo_lists = data_get($all_grouped_photo_lists,"un_used_photos");
        
        $unused_photos = [];
        foreach ($grouped_unused_photo_lists as $grouped_photo_list) {
            $photo_lists = data_get($grouped_photo_list, "photo_list");

            foreach ($photo_lists as $photo_list) {
                $photo_id = data_get($photo_list, "photo_id");
                try {
                    // サムネイルサイズのwater mark入りJPEGバイナリ。このAPIで画像取得してJPEG送信するAPIを作って利用してください。800px max
                    $thumbnail_photo_image = \PsApi::GetPSPhotoImage($photo_id, \PhotoMode::THUMBNAIL);
                    $image = \Image::make($thumbnail_photo_image);
                    $photo = new PhotoSpotImage;
                    $photo->width= $image->width();
                    $photo->height= $image->height();
                    $photo->photo_id= $photo_id;
                    $photo->data= $image->encode('data-url')->encoded;
                    // 製作用に元画像を取得するときのAPI (water markなしの大きいJPEGバイナリ
                    //$original_photo_image = \PsApi::GetPSPhotoImage($photo_id, \PhotoMode::FULL_IMAGE);
                    array_push($unused_photos, $photo);
                } catch (\Exception $exception) {
                    throw $exception;
                }
            }

            
        }
        return response()->json($unused_photos, 200);
    }
}
