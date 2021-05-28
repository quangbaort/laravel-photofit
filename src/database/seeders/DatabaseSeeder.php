<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\QaGroup;
use App\Models\Qa;
use App\Models\ProductCategory;
use App\Models\Guide;
use App\Models\News;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\ProductBackground;
use App\Models\BackgroundReview;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public $description;
    public function run()
    {
        $description = "";
        QaGroup::factory(5)->create();
        Qa::factory(5)->create();
        Product::create([
            'product_category_id' => '1',
            'name' => 'オリジナル写真集',
            'description' => '制作：ダイコロ　ハードカバー',
            'thumbnail' => 'product/thumbnail/オリジナル写真集.png',
            "price_estimate" => 4400,
            'slug' => 'photo-album',
            'number_images' => 1,
            "order" => 1,
        ]);
        Product::create([
            'product_category_id' => '1',
            'name' => 'フォトブック',
            'description' => '制作：富士フイルム　ソフトカバー',
            'thumbnail' => 'product/thumbnail/ソフトカバー.png',
            "price_estimate" => 3000,
            'slug' => 'photo-book',
            'number_images' => 1,
            "order" => 1,
        ]);
        Product::create([
            'product_category_id' => '2',
            'name' => 'フォトキャンバス',
            'description' => '',
            'thumbnail' => 'product/thumbnail/フォトキャンバス.png',
            "price_estimate" => 3600,
            'slug' => 'photo-canvas',
            'number_images' => 1,
            "order" => 1,
        ]);
        Product::create([
            'product_category_id' => '2',
            'name' => 'フォトパネル',
            'description' => '',
            'thumbnail' => 'product/thumbnail/フォトパネル.png',
            "price_estimate" => 4100,
            'slug' => 'photo-panel',
            'number_images' => 1,
            "order" => 1,
        ]);
        Product::create([
            'product_category_id' => '2',
            'name' => 'フォトポスター',
            'description' => '',
            'thumbnail' => 'product/thumbnail/フォトポスター.png',
            "price_estimate" => 2200,
            'slug' => 'photo-poster',
            'number_images' => 1,
            "order" => 1,
        ]);
        Product::create([
            'product_category_id' => '3',
            'name' => 'フォトカレンダー ',
            'description' => '',
            'thumbnail' => 'product/thumbnail/フォトカレンダー.png',
            "price_estimate" => 300,
            'slug' => 'photo-calendar',
            'number_images' => 1,
            "order" => 1,
        ]);
        Product::create([
            'product_category_id' => '4',
            'name' => 'フォトスタンド　カヌレ3個セット',
            'description' => '',
            'thumbnail' => 'product/thumbnail/カヌレ.png',
            "price_estimate" => 300,
            'slug' => 'photo-canele',
            'number_images' => 1,
            "order" => 1,
        ]);
        Product::create([
            'product_category_id' => '4',
            'name' => 'フォトスタンド　ポルト ',
            'description' => '',
            'thumbnail' => 'product/thumbnail/ポルト.png',
            "price_estimate" => 300,
            'slug' => 'photo-polt',
            'number_images' => 1,
            "order" => 1,
        ]);
        Product::create([
            'product_category_id' => '4',
            'name' => 'マグネット　クルミまる3個セット  ',
            'description' => '',
            'thumbnail' => 'product/thumbnail/クルミまる.png',
            "price_estimate" => 300,
            'slug' => 'photo-walnut1',
            'number_images' => 1,
            "order" => 1,
        ]);
        Product::create([
            'product_category_id' => '4',
            'name' => 'マグネット　クルミ四角3個セット ',
            'description' => '',
            'thumbnail' => 'product/thumbnail/クルミ四角.png',
            "price_estimate" => 300,
            'slug' => 'photo-walnut2',
            'number_images' => 1,
            "order" => 1,
        ]);
        // ProductCategory::factory(5)->create();
        ProductCategory::create([
            'category_name' => '写真集',
            'order' => 1,
        ]);
        ProductCategory::create([
            'category_name' => 'フォトパネル',
            'order' => 1,
        ]);
        ProductCategory::create([
            'category_name' => 'フォトアイテム',
            'order' => 1,
        ]);
        ProductCategory::create([
            'category_name' => 'フォトグッズ',
            'order' => 1,
        ]);
        Guide::factory(5)->create();
        for($i = 1 ; $i < 9 ; $i++){
            switch ($i) {
                case 1:
                  $description = "dshfdsbgbdsikb";
                  break;
                case 2:
                    $description = "dshfdsbgbdsikb";
                  break;
                case 3:
                    $description = "dshfdsbgbdsikb";
                  break;
                case 4:
                    $description = "dshfdsbgbdsikb";
                    break;
                case 5:
                    $description = "dshfdsbgbdsikb";
                break;
                case 6:
                    $description = "dshfdsbgbdsikb";
                    break;
                case 7:
                    $description = "dshfdsbgbdsikb";
                    break;
                case 8:
                    $description = "dshfdsbgbdsikb";
                break;
                case 9:
                    $description = "dshfdsbgbdsikb";
                    break;
                default:
                    $description = "dshfdsbgbdsikb";
            }
            ProductImage::create([
                'product_id' => 1 ,
                'image_url' => 'product/photoAlbum/写真集'.$i.'.png',
                'description' => $description
                
            ]);
        }
        ProductSize::create([
            'product_id' => 1,
            'size' => 'B6',
            'price' => 4400,
            'description' => "184mmx130mm(厚さ13mm)",
        ]);
        ProductSize::create([
            'product_id' => 1,
            'size' => 'A5',
            'price' => 4900,
            'description' => "213mm×150mm(厚さ13mm)",
        ]);
        ProductSize::create([
            'product_id' => 1,
            'size' => 'B5',
            'price' => 5800,
            'description' => "263mm×194mm(厚さ13mm)",
        ]);
        ProductBackground::create([
            'name' => 'いなし',
            'description' => '',
            'product_id' => 1 ,
            'background_url' => 'product/photoAlbum/background/写真集背景　サークル.png',
        ]);
        ProductBackground::create([
            'name' => 'いなし',
            'description' => '',
            'product_id' => 1 ,
            'background_url' => 'product/photoAlbum/background/写真集背景　テープ.png',
        ]);
        ProductBackground::create([
            'name' => 'いなし',
            'description' => '',
            'product_id' => 1 ,
            'background_url' => 'product/photoAlbum/background/写真集背景　なし.png',
        ]);
        ProductBackground::create([
            'name' => 'いなし',
            'description' => '',
            'product_id' => 1 ,
            'background_url' => 'product/photoAlbum/background/写真集背景　雲.png',
        ]);
        BackgroundReview::create([
            'product_background_id' => 1,
            'background_url' => 'product/photoAlbum/background/preview/写真集背景プレビュー　サークル1.png',
        ]);
        BackgroundReview::create([
            'product_background_id' => 1,
            'background_url' => 'product/photoAlbum/background/preview/写真集背景プレビュー　サークル2.png',
        ]);
        BackgroundReview::create([
            'product_background_id' => 1,
            'background_url' => 'product/photoAlbum/background/preview/写真集背景プレビュー　サークル3.png',
        ]);
        BackgroundReview::create([
            'product_background_id' => 1,
            'background_url' => 'product/photoAlbum/background/preview/写真集背景プレビュー　サークル4.png',
        ]);
        News::factory(10)->create();
    }
}
