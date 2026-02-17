<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogImage;
use App\Models\BlogItem;
use App\Utilities\StaticFunctions;
use Illuminate\Http\Request;
use File;
use App\Models\SlideImage;
use Intervention\Image\Facades\Image;
use Log;
use DB;

class BlogController extends Controller
{
    /**
     * List All Blogs
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request){
        $page_title = env('SITE_NAME').' - Blog Items';
        $section_title = 'Blog Items';

        $resources = BlogItem::orderBy('id', 'DESC')->paginate(6);

        $data = [
            'page_title' => $page_title,
            'section_title' => $section_title,
            'resources' => $resources
        ];

        return view("backend.webpages.blog.all_blogs", $data);
    }

    /**
     *
     */
    public function create(Request $request) {

        $page_title = env('SITE_NAME').' - Create Blog';
        $section_title = 'Create Blog ';


        $data = [
            'page_title' => $page_title,
            'section_title' => $section_title

        ];

        return view("backend.webpages.blog.create_blog", $data);
    }

    public function edit($id){
        $resource = BlogItem::findOrFail($id);
        $page_title = env('SITE_NAME').' - Edit Blog';

        $section_title = 'Blog - '.$resource->title;

        $resource_id = $resource->id;

        $data = [
            'page_title' => $page_title,
            'section_title' => $section_title,
            'resource' => $resource,
            'resource_id' => $resource_id
        ];

        return view("backend.webpages.blog.edit_blog", $data);

    }

    public function store(Request $request){

        $data = $request->all();


        $is_draft     = 0;
        $is_published = 0;

        if(strcmp($data['is_draft_or_publish'], 'is_draft') == 0){
            $is_draft = 1;
        }

        if(strcmp($data['is_draft_or_publish'], 'is_published') == 0){
            $is_published = 1;
        }


        $resource = BlogItem::create([
            'title'  => $data['title'],
            'teaser'          => $data['teaser'],
            'content'         => $data['content'],
            'is_draft'        => $is_draft,
            'is_published'    => $is_published,
            'image_url'       => 'None'

        ]);

        if($resource){

            $file_name = "";
            if( $request->hasFile('blog_image') ) {
                $file = $request->file('blog_image');
                $file_name = $this->uploadImage($file, $resource->id);
                // dd($file_name);
                $resource->image_url = $file_name;
                $resource->save();
            }else{
                $resource->image_url = 'blog-default.jpg';
                $resource->save();
            }

            $message = "Blog successfully created";
            $request->session()->flash('success', $message);
            return redirect()->back()->withInput();
        }else{
            $message = "There was a technical error while creating the blog";
            $request->session()->flash('failure', $message);
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request){
        $data = $request->all();
        $resource = BlogItem::find($data['resource_id']);
        $is_draft     = 0;
        $is_published = 0;

        if(strcmp($data['is_draft_or_publish'], 'is_draft') == 0){
            $is_draft = 1;
        }

        if(strcmp($data['is_draft_or_publish'], 'is_published') == 0){
            $is_published = 1;
        }


        $resource->title        = $data['title'];
        $resource->teaser       = $data['teaser'];
        $resource->content      = $data['content'];
        $resource->is_draft     = $is_draft;
        $resource->is_published = $is_published;
        $saved_id = $resource->save();

        // dd($resource->id);
        if($saved_id){
            // Remove all images first
            $deletedRows = BlogImage::where('blog_item_id', $resource->id)->delete();
            $file_name = "";
            if( $request->hasFile('blog_image') ) {
                $file = $request->file('blog_image');
                $file_name = $this->uploadImage($file, $resource->id);
                // If it was created successfully we now change the url on the asset
                // $resource->image_url = 'blog-default.jpg';
                $resource->image_url = $file_name;

                $resource->save();
                /* $image = BlogImage::create([
                    'image_url' => $file_name,
                    'blog_item_id' => $resource->id
                ]); */
            } else {
                // $resource->image_url = 'blog-default.jpg';
                $resource->save();
            } 

            $message = "Blog successfully updated";
            $request->session()->flash('success', $message);
            return redirect()->back()->withInput();
        }else{
            $message = "There was a technical error while updating the blog";
            $request->session()->flash('failure', $message);
            return redirect()->back()->withInput();
        }
    }

    public function delete(Request $request){
        $ajax_data = $request->all();
        $resource_id = $ajax_data['resource_uid'];
        BlogItem::destroy($resource_id);

        $response = StaticFunctions::createResponse(1);

        return json_encode($response);
    }

    public function uploadImage($file, $blog_id){

        $filename = "";

        $img = Image::make($file);
            $file_size_b = $img->filesize();
            $file_size_mb = $file_size_b / 1000000;

            if($file_size_mb > 20.0) {
                return "File size should be below 20MB";
                // return StaticFunctions::createResponse(0);
            }

            $document_root = $_SERVER['DOCUMENT_ROOT'];

            $filename = $file->getClientOriginalName();
            $file->move($document_root.'/images/blog_images/', $filename);



            // $file_path = StaticFunctions::resourceStoragePath('slideshow_images').$filename;
            $file_path = TRUE;


            if($file_path) {

                $image = BlogImage::create([
                    'image_url'    => $filename,
                    'blog_item_id' => $blog_id
                ]);

                if($image){
                    return $filename;
                }

            }
    }
}
