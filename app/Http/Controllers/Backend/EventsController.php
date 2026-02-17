<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EventExtraData;
use App\Models\EventExtraFormField;
use App\Models\EventImage;
use App\Models\Event;
use App\Models\EventSchedule;
use App\Utilities\StaticFunctions;
use Illuminate\Http\Request;
use File;
use Intervention\Image\Facades\Image;
use Log;
use DB;

class EventsController extends Controller
{
    /**
     * List All Events
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request){
        $page_title = env('SITE_NAME').' - Events';
        $section_title = 'Events';

        $resources = Event::orderBy('id', 'DESC')->paginate(6);

        $data = [
            'page_title' => $page_title,
            'section_title' => $section_title,
            'resources' => $resources
        ];

        return view("backend.webpages.event.all_events", $data);
    }

    /**
     *
     */
    public function create(Request $request) {

        $page_title = env('SITE_NAME').' - Create Event';
        $section_title = 'Create Event ';


        $data = [
            'page_title' => $page_title,
            'section_title' => $section_title

        ];

        return view("backend.webpages.event.create_event", $data);
    }

    public function edit($id){
        $resource = Event::findOrFail($id);
        $page_title = env('SITE_NAME').' - Edit Event';

        $section_title = 'Event - '.$resource->title;
        $event_extra_data = EventExtraData::where('event_id', $id)->get();
        $event_extra_form_fields = EventExtraFormField::where('event_id', $id)->get();

        $resource_id = $resource->id;

        $data = [
            'page_title'       => $page_title,
            'section_title'    => $section_title,
            'resource'         => $resource,
            'resource_id'      => $resource_id,
            'event_extra_data' => $event_extra_data,
            'extra_fields' => $event_extra_form_fields,
        ];

        // return $data;

        return view("backend.webpages.event.edit_event", $data);

    }

    public function store(Request $request){

        $data = $request->all();

        // return $data;

        $is_draft     = 0;
        $is_published = 0;

        if(strcmp($data['is_draft_or_publish'], 'is_draft') == 0){
            $is_draft = 1;
        }

        if(strcmp($data['is_draft_or_publish'], 'is_published') == 0){
            $is_published = 1;
        }

        // return $data;


        $resource = Event::create([
            'title'           => $data['title'],
            'location'           => $data['location'],
            'cost'           => $data['cost']??null,
            'description'     => $data['description'],
            'start_date'         => $data['start_date'],
            'end_date'         => $data['end_date'],
            'is_draft'        => $is_draft,
            'is_published'    => $is_published,
            'pricingMode'    => $data['pricingMode'],
            'visibility'    => $data['visibility']??'visible',
            'image_url'       => 'None'

        ]);

        

        if($resource){
            if($request->has('name_of_field')){

                foreach(array_combine($data['name_of_field'] ,$data['value_of_field'] ) as $key=>$value) {

                    EventExtraData::create([
                        'event_id'       => $resource->id,
                        'name_of_field'  => $key,
                        'value_of_field' => $value
                    ]);
                }
            }

            if($request->has('name_of_form_field')){

                $is_required = $data['is_required'] ?? [];
                foreach($data['name_of_form_field'] as $i => $ff) {

                    EventExtraFormField::create([
                        'event_id'           => $resource->id,
                        'name_of_form_field' => $ff,
                        'is_required'        => !empty($is_required[$i]),
                    ]);
                }
            }

            $file_name = "";
            if( $request->hasFile('image') ) {
                $file = $request->file('image');
                $file_name = $this->uploadImage($file, $resource->id);
                // dd($file_name);
                $resource->image_url = $file_name;
                $resource->save();
            }else{
                $resource->image_url = 'event-default.jpg';
                $resource->save();
            }

            $message = "Event successfully created";
            $request->session()->flash('success', $message);
            return redirect()->back()->withInput();
        }else{
            $message = "There was a technical error while creating the event";
            $request->session()->flash('failure', $message);
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request){
        $data = $request->all();
        // dd($data);

        $resource = Event::find($data['resource_id']);
        $is_draft     = 0;
        $is_published = 0;

        if(strcmp($data['is_draft_or_publish'], 'is_draft') == 0){
            $is_draft = 1;
        }

        if(strcmp($data['is_draft_or_publish'], 'is_published') == 0){
            $is_published = 1;
        }


        $resource->title        = $data['title'];
        $resource->location        = $data['location'];
        $resource->cost        = $data['cost']??null;
        $resource->description  = $data['description'];
        $resource->start_date   = $data['start_date'];
        $resource->end_date     = $data['end_date'];
        $resource->is_draft     = $is_draft;
        $resource->is_published = $is_published;
        $resource->visibility     = $data['visibility']??'visible';
        $resource->pricingMode     = $data['pricingMode'];
        $saved_id = $resource->save();

        // return $resource;

        // dd($resource->id);
        if($saved_id){
            if($request->has('name_of_field')){
                EventExtraData::where('event_id', $resource->id)->delete();
                foreach(array_combine($data['name_of_field'] ,$data['value_of_field'] ) as $key=>$value) {

                    EventExtraData::create([
                        'event_id'       => $resource->id,
                        'name_of_field'  => $key,
                        'value_of_field' => $value
                    ]);
                }
            }else{
                EventExtraData::where('event_id', $resource->id)->delete();
            }

            if($request->has('name_of_form_field')){
                EventExtraFormField::where('event_id', $resource->id)->delete();
                $is_required = $data['is_required'] ?? [];
                foreach($data['name_of_form_field'] as $i => $ff) {

                    EventExtraFormField::create([
                        'event_id'           => $resource->id,
                        'name_of_form_field' => $ff,
                        'is_required'        => !empty($is_required[$i]),
                    ]);
                }
            }else{
                EventExtraFormField::where('event_id', $resource->id)->delete();
            }

            // Remove all images first
            
            if( $request->hasFile('image') ) {
                $deletedRows = EventImage::where('event_id', $resource->id)->delete();
                
                $file = $request->file('image');
                $file_name = $this->uploadImage($file, $resource->id);
                // If it was created successfully we now change the url on the asset
                $resource->image_url = $file_name;
                
                /* $image = EventImage::create([
                    'image_url' => $file_name,
                    'event_id' => $resource->id
                ]); */
            } else {
                //$resource->image_url = 'event-default.jpg';
                
            }

            $resource->save();

            $message = "Event successfully updated";
            $request->session()->flash('success', $message);
            return redirect()->back()->withInput();
        }else{
            $message = "There was a technical error while updating the event";
            $request->session()->flash('failure', $message);
            return redirect()->back()->withInput();
        }
    }

    public function delete(Request $request){
        $ajax_data = $request->all();
        $resource_id = $ajax_data['resource_uid'];
        Event::destroy($resource_id);

        $response = StaticFunctions::createResponse(1);

        if($request->ajax()) {
            return json_encode($response);
        }
        return redirect()->back();
    }

    public function uploadImage($file, $event_id){

        $filename = "";

        $img = Image::make($file);
            $file_size_b = $img->filesize();
            $file_size_mb = $file_size_b / 1000000;

            if($file_size_mb > 20.0) {
                return "Image file should be below 20MB";
                // return StaticFunctions::createResponse(0);
            }

            $document_root = $_SERVER['DOCUMENT_ROOT'];

            $filename = $file->getClientOriginalName();
            $file->move($document_root.'/images/event_images/', $filename);



            // $file_path = StaticFunctions::resourceStoragePath('slideshow_images').$filename;
            $file_path = TRUE;


            if($file_path) {

                $image = EventImage::create([
                    'image_url'    => $filename,
                    'event_id' => $event_id
                ]);

                if($image){
                    return $filename;
                }

            }
    }
}
