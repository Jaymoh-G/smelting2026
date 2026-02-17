<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AreaOfFocusImage;
use App\Models\AreaOfFocus;
use App\Models\SubService;
use App\Utilities\StaticFunctions;
use Illuminate\Http\Request;
use File;
use Intervention\Image\Facades\Image;
use Log;
use DB;

class AreaOfFocusController extends Controller
{
    /**
     * List All Area Of Focuss
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request){
        $page_title = env('SITE_NAME').' - Areas Of Focus';
        $section_title = 'Areas Of Focus';

        $resources = AreaOfFocus::orderBy('id', 'DESC')->paginate(20);

        $data = [
            'page_title' => $page_title,
            'section_title' => $section_title,
            'resources' => $resources
        ];

        return view("backend.webpages.area_of_focus.all_area_of_focus", $data);
    }

    /**
     *
     */
    public function create(Request $request) {

        $page_title = env('SITE_NAME').' - Create Area Of Focus';
        $section_title = 'Create Area Of Focus ';


        $data = [
            'page_title' => $page_title,
            'section_title' => $section_title

        ];

        return view("backend.webpages.area_of_focus.create_area_of_focus", $data);
    }

    public function edit($id){
        $resource = AreaOfFocus::findOrFail($id);
        $page_title = env('SITE_NAME').' - Edit Area Of Focus';

        $section_title = 'Area Of Focus - '.$resource->title;

        $resource_id = $resource->id;
        $sub_services = SubService::where('parent_service_id', $resource_id)->get();
        //dd($sub_services);

        $data = [
            'page_title'    => $page_title,
            'section_title' => $section_title,
            'resource'      => $resource,
            'resource_id'   => $resource_id,
            'sub_services'  => $sub_services
        ];

        return view("backend.webpages.area_of_focus.edit_area_of_focus", $data);

    }

    public function store(Request $request){

        $data = $request->all();

        /* $is_draft     = 0;
        $is_published = 0;

        if(strcmp($data['is_draft_or_publish'], 'is_draft') == 0){
            $is_draft = 1;
        }

        if(strcmp($data['is_draft_or_publish'], 'is_published') == 0){
            $is_published = 1;
        } */


        $resource = AreaOfFocus::create([
            'title'  => $data['title'],
            'content'         => $data['content'],
            // 'is_draft'        => $is_draft,
            // 'is_published'    => $is_published,
            'image_url'       => 'None'

        ]);

        if($resource){
            if($request->has('sub_service')){
                // Create the subs
                foreach($data['sub_service'] as $sub_name){
                    SubService::create([
                        'title'             => $sub_name,
                        'parent_service_id' => $resource->id
                    ]);
                }
            }

            $file_name = "";
            if( $request->hasFile('image') ) {
                $file = $request->file('image');
                $file_name = $this->uploadImage($file, $resource->id);

                $resource->image_url = $file_name;
                $resource->save();
            }else{
                $resource->image_url = 'area_of_focus-default.png';
                $resource->save();
            }

            $message = "Area Of Focus successfully created";
            $request->session()->flash('success', $message);
            return redirect()->back()->withInput();
        }else{
            $message = "There was a technical error while creating the area_of_focus";
            $request->session()->flash('failure', $message);
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request){
        $data = $request->all();

        $resource = AreaOfFocus::find($data['resource_id']);
        /* $is_draft     = 0;
        $is_published = 0;

        if(strcmp($data['is_draft_or_publish'], 'is_draft') == 0){
            $is_draft = 1;
        }

        if(strcmp($data['is_draft_or_publish'], 'is_published') == 0){
            $is_published = 1;
        } */


        $resource->title        = $data['title'];

        $resource->content      = $data['content'];
        // $resource->is_draft     = $is_draft;
        // $resource->is_published = $is_published;
        $saved_id = $resource->save();

        if($saved_id){
            // Remove all images first
            $deletedImages = AreaOfFocusImage::where('area_of_focus_id', $resource->id)->delete();
            $deletedSubservices = SubService::where('parent_service_id', $resource->id)->delete();

            $file_name = "";
            if( $request->hasFile('image') ) {
                $file = $request->file('image');
                $file_name = $this->uploadImage($file, $resource->id);

                $resource->image_url = $file_name;
                $resource->save();

            }

            if($request->has('sub_service')){
                // Create the subs
                foreach($data['sub_service'] as $sub_name){
                    SubService::create([
                        'title'             => $sub_name,
                        'parent_service_id' => $resource->id
                    ]);
                }
            }

            $message = "Area Of Focus successfully updated";
            $request->session()->flash('success', $message);
            return redirect()->back()->withInput();
        }else{
            $message = "There was a technical error while updating the area_of_focus";
            $request->session()->flash('failure', $message);
            return redirect()->back()->withInput();
        }
    }

    public function delete(Request $request){
        $ajax_data = $request->all();
        $resource_id = $ajax_data['resource_uid'];
        AreaOfFocus::destroy($resource_id);

        $response = StaticFunctions::createResponse(1);

        return json_encode($response);
    }

    public function uploadImage($file, $area_of_focus_id){

        $filename = "";

        $img = Image::make($file);
            $file_size_b = $img->filesize();
            $file_size_mb = $file_size_b / 1000000;

            if($file_size_mb > 2.0) {
                return StaticFunctions::createResponse(0);
            }

            $document_root = $_SERVER['DOCUMENT_ROOT'];

            $filename = $file->getClientOriginalName();
            $file->move($document_root.'/images/area_of_focus/', $filename);



            // $file_path = StaticFunctions::resourceStoragePath('slideshow_images').$filename;
            $file_path = TRUE;


            if($file_path) {

                $image = AreaOfFocusImage::create([
                    'image_url'    => $filename,
                    'area_of_focus_id' => $area_of_focus_id
                ]);

                if($image){
                    return $filename;
                }

            }
    }
}
