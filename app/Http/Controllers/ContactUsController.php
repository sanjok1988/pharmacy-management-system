<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function enquiryform(Request $request)
    {
        $companyname = $request->companyname;
        $post_number1 = $request->post_number1;
        $address = $request->address;
        $kanji_full_name = $request->kanji_full_name;
        $Katakana_full_name = $request->Katakana_full_name;
        $email_address = $request->email_address;
        $contacttype = $request->contacttype;

        $general_message = $request->general_messages;

        $general_message = $request->general_messages;


        $data = array(
            'companyname' => $companyname,
            'post_number1' => $post_number1,
            'address' => $address,
            'kanji_full_name' => $kanji_full_name,
            'Katakana_full_name' => $Katakana_full_name,
            'email_address' => $email_address,
            'contacttype' => $contacttype,

            'message' => $general_message

        );

     
        Mail::send('hibiku.contactus_form_data', $data, function ($message) {
            $message->from('ayub.singhh089@gmail.com', 'From Visitor');
            $message->to('ayub.singhh089@gmail.com')->subject('Hibiku Corporation Email Test');
        });
    }

    public function enquiryform2(Request $request)
    {
        //  dd($request);
        $type = $request->type;
        $kanji_name = $request->kanji_name;
        $katakana_name = $request->katakana_name;


        $contact_number =$request->contact_number;

        $email = $request->email;
        $contact = $request->contact;
        $general_message = $request->general_message;

        $data = array(
            'type' => $type,
            'kanji_name' => $kanji_name,
            'katakana_name' => $katakana_name,


            'contact_number' => $contact_number,

            'contact' => $contact,
            'email' => $email,
            'general_message' => $general_message

        );
        Mail::send('hibiku.genearal_inquiry_data', $data, function ($message) {
            $message->from('ayub.singhh089@gmail.com', 'From Visitor');
            $message->to('ayub.singhh089@gmail.com')->subject('Hibiku General enquiry Test');
        });
    }



    public function mail()
    {
        $data = array("name" => "joshua", "body" => "this is email");

        Mail::send('hibiku.contact_us3', $data, function ($message) {
            $message->from('ayub.singhh089@gmail.com', 'From Visitor');
            $message->to('ayub.singhh089@gmail.com')->subject('Online Email Test');
        });
    }
}
