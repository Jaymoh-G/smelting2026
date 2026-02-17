<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\CoreValue;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(){
        $page_title = env('SITE_NAME').' - About Us';
        $section_title = 'About Us';

        $core_values = CoreValue::all();
        $about = AboutUs::findOrFail(1);

        $data = [
            'page_title' => $page_title,
            'section_title' => $section_title,
            'core_values' => $core_values,
            'about' => $about,
        ];

        return view("backend.webpages.about_us.index", $data);
    }

    public function saveAboutUs(Request $request)
    {
        $form_data = $request->all();

        $about_us = AboutUs::findOrFail(1);

        $about_us->intro = $form_data['intro'];
        $about_us->who_we_are = $form_data['who_we_are'];
        $about_us->core_business = $form_data['core_business'];
        $about_us->who_we_work_with = $form_data['who_we_work_with'];
        $about_us->mission = $form_data['mission'];
        $about_us->vision = $form_data['vision'];
        $about_us->save();

        $deleted_values = CoreValue::where('id', '>', 0)->delete();
        if($request->has('title')){
            $value_titles = $form_data['title'];
            $value_texts  = $form_data['text'];
            // Create the subs
            foreach($value_titles as $index => $value_title){
                CoreValue::create([
                    'title'    => $value_title,
                    'text'     => $value_texts[$index],
                ]);
            }
        }

        $message = "Content successfully updated";
        $request->session()->flash('success', $message);
        return redirect()->back()->withInput();
    }

}
