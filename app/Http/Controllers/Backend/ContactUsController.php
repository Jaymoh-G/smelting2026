<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(Request $request){
        $page_title = env('SITE_NAME').' - Contact Us';
        $section_title = 'Contact Us';

        $resource = ContactUs::findOrFail(1);
        $resource_id = $resource->id;

        $data = [
            'page_title' => $page_title,
            'section_title' => $section_title,
            'resource' => $resource,
            'resource_id' => $resource_id
        ];

        return view("backend.webpages.contact_us.contact_us", $data);
    }

    public function saveContactUs(Request $request) {
        $form_data = $request->all();

        $resource_id  = $form_data['resource_id'];

        $resource = ContactUs::findOrFail($resource_id);

        $resource->physical_location   = $form_data['physical_location'];
        $resource->email   = $form_data['email'];
        $resource->telephone   = $form_data['telephone'];
        $resource->facebook   = $form_data['facebook'];
        $resource->twitter   = $form_data['twitter'];
        $resource->linkedin   = $form_data['linkedin'];
        $resource->instagram   = $form_data['instagram'];

        if($resource->save()){
            $message = 'Saved successfully';
            $request->session()->flash('success', $message);
        }else{
            $message = 'We encountered an error while saving';
            $request->session()->flash('failure', $message);
        }

        return redirect()->back();
    }

    public function loggedInUser(){
        // Get logged in user
        $user = Auth::user();
        return $user;
    }
}
