<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CSRController extends Controller
{
    public function index(Request $request){

        $data = [
            'page_title' => 'Home',
            // 'countries' => Country::all()
        ];
        return view('frontend.pages.csr', $data);
    }
}
