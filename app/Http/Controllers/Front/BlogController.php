<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\BlogItem;
use Illuminate\Http\Request;
use Log;


class BlogController extends Controller
{
    public function index(Request $request){
        $blogs = BlogItem::take(3)->orderBy('id', 'DESC')->get();

        $data = [
            'page_title' => 'Blog',
            // 'countries' => Country::all()
            'blog_items' => $blogs
        ];
        return view('frontend.pages.blog', $data);
    }

    public function getSingleBlog($id){
        $blog_item = BlogItem::findOrFail($id);
        // return $blog_item;
        // $data = [
        //     // 'page_title' => $blog_item->title,
        //     // 'countries' => Country::all()
        //     'blog_item' => $blog_item
        // ];
        // return view('frontend.pages.blog-single', $blog_item);
        return view('frontend.pages.blog-single', ['blog_item' => $blog_item]);
    }

}
