<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\SubscriptionCopy;
use App\Models\AboutUs;
use App\Models\Accreditation;
use App\Models\AreaOfFocus;
use App\Models\CoreValue;
use App\Models\SlideImage;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Log;


class HomepageController extends Controller
{
    public function welcome(Request $request){

        $slideimages = SlideImage::all();
        $areas_of_focus = AreaOfFocus::all();
        $about_us = AboutUs::first();
        $values = CoreValue::all();
        $value_count = $values->count();

        $by_2 = $value_count/2;

        $value_set_1 = CoreValue::limit($by_2)->orderBy('id', 'ASC')->get();
        $value_set_2 = CoreValue::latest()->orderBy('id', 'DESC')->take($by_2)->get();

        $data = [
            'page_title' => 'Home',
            'slide_images' => $slideimages,
            'areas_of_focus' => $areas_of_focus,
            'about_us' => $about_us,
            'value_set_1' => $value_set_1,
            'value_set_2' => $value_set_2,
            'accreditations' => Accreditation::all()
        ];
        return view('frontend.pages.homepage', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();

        // Check for already existing email and phone number
        $email_exists = Subscriber::where('email_address', $form_data['email_address'])->count();
        $phone_exists = Subscriber::where('phone_number', $form_data['phone_number'])->count();
        if($email_exists > 0){
            $message = "A Subscriber with that email address already exists";
            $request->session()->flash('failure', $message);
            return redirect()->back()->withInput();
        }
        if($phone_exists > 0){
            $message = "A Subscriber with that phone numbers already exists";
            $request->session()->flash('failure', $message);
            return redirect()->back()->withInput();
        }

        $expertise = "";
        if($request->has('field_of_expertise')){
            $expertise = implode(" ", $form_data['field_of_expertise']);
        }
        $subscriber = Subscriber::create(
            [
                'salutation'    => $form_data['salutation'],
                'first_name'    => $form_data['first_name'],
                'last_name'     => $form_data['last_name'],
                'email_address' => $form_data['email_address'],
                'phone_number'  => $form_data['phone_number'],
                'country'       => $form_data['country'],
                'city'          => $form_data['city'],
                'company'       => $form_data['company'],
                'field_of_expertise'  => $expertise, // Mash up into one string
                'years_of_experience' => $form_data['years_of_experience'],
                'message'             => $form_data['message']
            ]
        );

        if($subscriber){
            // Send email here if user asked for one
            if($request->has('send_email_copy')){
                Log::info('Mail to be sent to '. $form_data['email_address']);
                Mail::to($form_data['email_address'])
                    ->send(new SubscriptionCopy($subscriber));
            }

            $request->session()->flash('success', "We have received you request we will get back to you soonest possible");
            return redirect()->back()->withInput();
        }


    }
}
