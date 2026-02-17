<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Country;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Log;


class AboutUsController extends Controller
{
    public function index(Request $request){
        $team_members = TeamMember::all();
        $about_content = AboutUs::first();
        $data = [
            'page_title' => 'About Us',
            'team_members'       => $team_members,
            'about_content'       => $about_content,
        ];
        return view('frontend.pages.about-us', $data);

    }

}
