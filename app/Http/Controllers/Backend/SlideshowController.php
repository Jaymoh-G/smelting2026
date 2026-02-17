<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utilities\StaticFunctions;
use File;
use App\Models\SlideImage;
use Intervention\Image\Facades\Image;
use Log;
use DB;


class SlideshowController extends Controller
{
    public function index(Request $request){

        $section_title = 'Slideshow Images ';
        $page_title = env('SITE_NAME').' - '.$section_title;

        // Get the images
        $images = SlideImage::all();

        $data = [
            'page_title'     => $page_title,
            'section_title'  => $section_title,
            'images'         => $images,
            'assets_folder'  => 'slideshow_images'
        ];

        return view("backend.webpages.slideshow.slideshow", $data);
    }

    public function uploadImages(Request $request){
        $file = null;
        $filename = "";

        if( $request->hasFile('file') ) {

            $file = $request->file('file');
            $img = Image::make($file);
            $file_size_b = $img->filesize();
            $file_size_mb = $file_size_b / 1000000;

            if($file_size_mb > 2.0) {
                return StaticFunctions::createResponse(0);
            }

            $document_root = $_SERVER['DOCUMENT_ROOT'];

            $filename = $file->getClientOriginalName();
            $file->move($document_root.'/images/slideshow_images/', $filename);



            // $file_path = StaticFunctions::resourceStoragePath('slideshow_images').$filename;
            $file_path = TRUE;


            if($file_path) {

                $slide_image = SlideImage::create([
                    'image_url'       => $filename
                ]);

                if($slide_image){
                    $response = StaticFunctions::createResponse(1);
                }

                return json_encode($response);
            }
        }
    }

    public function editImageView($resource_id){
        $section_title = 'Slideshow Images ';
        $page_title = env('SITE_NAME').' - '.$section_title;

        // Get the images
        $image = SlideImage::where('id', $resource_id)->first();
        // $domain_name = "http://172.25.148.152/";

        $data = [
            'page_title'     => $page_title,
            'section_title'  => $section_title,
            'resource'         => $image,
            'assets_folder'  => 'slideshow_images',
            // 'domain_name'    => $domain_name
        ];

        return view("backend.webpages.slideshow.slideshow_singleview", $data);
    }


    public function updateResource(Request $request){
        $form_data = $request->all();

        $title        = $form_data['title'];
        $description  = $form_data['description'];
        $resource_id  = $form_data['resource_id'];

        $resource = SlideImage::findOrFail($resource_id);

        $resource->title       = $title;
        $resource->description = $description;


        if($resource->save()){
            $message = 'Image successfully updated';
        }else{
            $message = 'Image successfully updated';
        }

        $request->session()->flash('success', $message);

        return redirect()->back();

    }

    /**
     * @param Request $request
     * @return string
     */
    public function deleteImage(Request $request) {
        $ajax_data = $request->all();

        //First remove from the FS
        $image_name = $ajax_data['image_name'];

        // $file_path = StaticFucntions::resourceStoragePath('slideshow_images').$image_name;
        $document_root = $_SERVER['DOCUMENT_ROOT'];
        $file_path = $document_root.'/images/slideshow_images/'. $image_name;

        $unlink_resp = unlink($file_path);
        if($unlink_resp){

            //Now delete from the DB
            $image_uid = $ajax_data['image_uid'];
            SlideImage::destroy($image_uid);

            $response = StaticFunctions::createResponse(1);
            return (json_encode($response));
        }

    }

    ///////////////////////////////////////////////////////////
    //////////////////// GOOGLE BUCKET OPS ////////////////////
    ///////////////////////////////////////////////////////////
    /**
     * @param Request $request
     * @return array
     */
    function uploadSlideshowToGS(Request $request)
    {
        /***
         * Maybe we need to check what environment we in here so that we know if we need to invoke authentication
         */

        $file = null;

        if( $request->hasFile('file') ) {
            $source = $request->file('file');

            // START Check size
            $img = Image::make($source);
            $file_size_b = $img->filesize();
            $file_size_mb = $file_size_b / 1000000;

            if($file_size_mb > 2.0) {
                return StaticFunctions::createResponse(0);
            }
            // END Check size

            $ext = File::extension($source->getClientOriginalName());

//            $filename = $source->getClientOriginalName(); // We don't want this cause many peeps can upload an image with the same name hence overwiting each other
            $filename1 = $this->randomLogoName(8);
            $filename = $filename1.".".$ext;

            $bucketName = env('MAIN_BUCKET');

            $storage = new StorageClient();
            $file = fopen($source, 'r');
            $bucket = $storage->bucket($bucketName);
            $upload_status = $object = $bucket->upload($file, [
                'name' => $filename

            ]);
            // Make the object public here
            $object->update(['acl' => []], ['predefinedAcl' => 'PUBLICREAD']);

            // Now create a new slideshow image model
            $slide_image = SlideImage::create([
                'image_url'       => $filename
            ]);

            if($slide_image){
                $response = StaticFunctions::createResponse(1);
            }

            return json_encode($response);


        }else{
            return [];
        }

    }

    public function randomLogoName($length_of_string)
    {
        // String of all alphanumeric character
        $orgininator = '23456789ABCDEFGHKMNPRSTWXYZ';

        // Shuffle the orgininator
        $str_result = substr(str_shuffle($orgininator),0, $length_of_string);

        // Check if the result exists already
        $exists = DB::table('slide_images')->where('random_name', $str_result)->exists();

        // If it exists, shuffle again, else return what we got
        if($exists == true){
            $this->randomLogoName(8);
        }else{
            return $str_result;
        }

    }
}
