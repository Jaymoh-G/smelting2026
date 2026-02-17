<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AccreditationImage;
use App\Models\Accreditation;
use App\Utilities\StaticFunctions;
use Illuminate\Http\Request;
use File;
use Intervention\Image\Facades\Image;
use Log;
use DB;

class AccreditationController extends Controller
{
    /**
     * List All Accreditations
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request){
        $page_title = env('SITE_NAME').' - Accreditation Items';
        $section_title = 'Accreditation Items';

        $resources = Accreditation::orderBy('id', 'DESC')->paginate(6);

        $data = [
            'page_title' => $page_title,
            'section_title' => $section_title,
            'resources' => $resources
        ];

        return view("backend.webpages.accreditation.index", $data);
    }

    /**
     *
     */
    public function create(Request $request) {

        $page_title = env('SITE_NAME').' - Create Accreditation';
        $section_title = 'Create Accreditation ';


        $data = [
            'page_title' => $page_title,
            'section_title' => $section_title

        ];

        return view("backend.webpages.accreditation.create", $data);
    }

    public function edit($id){
        $resource = Accreditation::findOrFail($id);
        $page_title = env('SITE_NAME').' - Edit Accreditation';

        $section_title = 'Accreditation - '.$resource->title;

        $resource_id = $resource->id;

        $data = [
            'page_title' => $page_title,
            'section_title' => $section_title,
            'resource' => $resource,
            'resource_id' => $resource_id
        ];

        return view("backend.webpages.accreditation.edit", $data);

    }

    public function store(Request $request){

        $data = $request->all();

        $resource = Accreditation::create([
            'title'  => $data['title'],
            'show_title'  => $data['show_title'],
            'image_url'       => 'None'

        ]);

        if($resource){

            $file_name = "";
            if( $request->hasFile('accreditation_image') ) {
                $file = $request->file('accreditation_image');
                $file_name = $this->uploadImage($file, $resource->id);
                // dd($file_name);
                $resource->image_url = $file_name;
                $resource->save();
            }else{
                $resource->image_url = 'accreditation-default.jpg';
                $resource->save();
            }

            $message = "Accreditation successfully created";
            $request->session()->flash('success', $message);
            return redirect()->back()->withInput();
        }else{
            $message = "There was a technical error while creating the accreditation";
            $request->session()->flash('failure', $message);
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request){
        $data = $request->all();
        $resource = Accreditation::find($data['resource_id']);

        $resource->title        = $data['title'];
        $resource->show_title        = $data['show_title'];
        $saved_id = $resource->save();

        if($saved_id){

            if( $request->hasFile('accreditation_image') ) {
                // dd($data);

                $deletedRows = AccreditationImage::where('accreditation_item_id', $resource->id)->delete();
                $file_name = "";
                $file = $request->file('accreditation_image');
                $file_name = $this->uploadImage($file, $resource->id);
                // If it was created successfully we now change the url on the asset
                $resource->image_url = $file_name;
                $resource->save();

            }

            $message = "Accreditation successfully updated";
            $request->session()->flash('success', $message);
            return redirect()->back()->withInput();
        }else{
            $message = "There was a technical error while updating the accreditation";
            $request->session()->flash('failure', $message);
            return redirect()->back()->withInput();
        }
    }

    public function delete(Request $request){
        $ajax_data = $request->all();
        $resource_id = $ajax_data['resource_uid'];
        Accreditation::destroy($resource_id);

        $response = StaticFunctions::createResponse(1);

        return json_encode($response);
    }

    public function uploadImage($file, $accreditation_id){

        $filename = "";

        $img = Image::make($file);
        $file_size_b = $img->filesize();
        $file_size_mb = $file_size_b / 1000000;

        if($file_size_mb > 2.0) {
            return StaticFunctions::createResponse(0);
        }

        $document_root = $_SERVER['DOCUMENT_ROOT'];

        $filename = $file->getClientOriginalName();
        $file->move($document_root.'/images/accreditation_images/', $filename);

        $file_path = TRUE;


        if($file_path) {

            $image = AccreditationImage::create([
                'image_url'    => $filename,
                'accreditation_item_id' => $accreditation_id
            ]);

            if($image){
                return $filename;
            }

        }
    }
}
