<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Contact;


class ContactController extends Controller
{
    //
    public function sendContact(Request $request)
    {
        try{
            $contact = Contact::create([
                'last_name' => $request->lastName,
                'first_name'=> $request->firstName,
                'last_name_furigana'=> $request->lastNameKana,
                'first_name_furigana'=> $request->firstNameKana,
                'email' => $request->email,
                'content' => $request->content,
                'contact_type' => $request->type,
            ]);
    
            Mail::to(config('app.contact_mail_to_address'))->queue(new ContactMail($contact));
            return response()->json('', 201);

        } catch (Exception $e){
            return response()->json($e, 500);
        }
        
    }
}
