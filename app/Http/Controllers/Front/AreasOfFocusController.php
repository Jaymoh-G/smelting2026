<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AreaOfFocus;
use App\Models\SubService;
use Illuminate\Http\Request;

class AreasOfFocusController extends Controller
{
    public function index(Request $request){
        $areas_of_focus = AreaOfFocus::all();
        $data = [
            'page_title' => 'Areas of focus',
            // 'countries' => Country::all()
            'areas_of_focus' => $areas_of_focus
        ];
        return view('frontend.pages.areas_of_focus', $data);
    }
}
