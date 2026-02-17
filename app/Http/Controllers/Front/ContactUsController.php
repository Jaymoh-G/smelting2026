<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormEmail;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Log;
use Session;
Use Response;


class ContactUsController extends Controller
{
    public function index(Request $request){
        $contact_data = ContactUs::first();
        $phone_numbers = $contact_data->telephone;
        $phone_numbers_array = explode( ",", $phone_numbers);

        $emails = $contact_data->email;
        $emails_array = explode( ",", $emails);


        $facebook = $contact_data->facebook;
        $twitter = $contact_data->twitter;
        $instagram = $contact_data->instagram;
        $linkedin = $contact_data->linkedin;

        $data = [
            'page_title' => 'Contact Us',
            'phones' => $phone_numbers_array,
            'emails' => $emails_array,
            'facebook'  => $facebook,
            'twitter'   => $twitter,
            'instagram' => $instagram,
            'linkedin'  => $linkedin,
            'contact_data'  => $contact_data,

        ];
        return view('frontend.pages.contact-us', $data);
    }

    public function sendMail(Request $request){
        $form_data = $request->all();

        Mail::to(env("ADMIN_EMAIL"))
            ->send(new ContactFormEmail($form_data));

        $request->session()->flash('success', "We have received your request we will get back to you soonest possible");
        return redirect()->back()->withInput();
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function sendMailAjax(Request $request){
        $form_data = $request->all();

        /*Session::put(['success' => true]);
        return Response::json(['status' => 'success']);*/


        Mail::to(env("ADMIN_EMAIL"))
            ->send(new ContactFormEmail($form_data['formData']));

        /*Log::info("mail_response");
        Log::info($mail_response);*/

        $response = [
            "Code" => "200",
            "Description" => "Success",
        ];
        // $response = "Profile successfully updated";
        $request->session()->flash('flash_message', $response);
        Session::flash('success', 'Message sent successfully!');

        return json_encode($response);

        /*

        $request->session()->flash('success', "We have received your request we will get back to you soonest possible");
        return redirect()->back()->withInput();*/
    }

}
