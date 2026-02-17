<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Models\TeamMemberImage;
use App\Utilities\StaticFunctions as SF;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Log;

class TeamMembersController extends Controller
{
    public function index(Request $request){

        $section_title = 'Team Members ';
        $page_title = env('SITE_NAME').' - '.$section_title;

        // Get the images
        $team_members = TeamMember::all();

        $data = [
            'page_title'     => $page_title,
            'section_title'  => $section_title,
            'team_members'         => $team_members,
        ];

        return view("backend.webpages.team.team_members", $data);
    }

    public function create(Request $request){

        $section_title = 'Create Team Member ';
        $page_title = env('SITE_NAME').' - '.$section_title;



        $data = [
            'page_title'     => $page_title,
            'section_title'  => $section_title,

        ];

        return view("backend.webpages.team.team_member_create", $data);
    }

    public function store(Request $request){

        $ajax_data = $request->all();

        $created = TeamMember::create([
            'name' => $ajax_data['name'],
            'title' => $ajax_data['title'],
            'linkedin' => $ajax_data['linkedin']
        ]);
        if($created) {
            // Now we upload files
            $file = null;
            if( $request->hasFile('file') ) {

                $file = $request->file('file');
                $file_name = $this->uploadImage($file, $created->id);

                $created->image = $file_name;
                $created->save();
            }else{
                $created->image = 'silhouette.jpg';
                $created->save();
            }

            $message = "Team Member Created Successfully";
            $request->session()->flash('success', $message);
            $response = SF::createResponse(1);
            return $response;
        }else{

            $response = SF::createResponse(0);
            return $response;
        }
    }


    public function editTeamMember($resource_id){
        $section_title = 'Team Members';
        $page_title = env('SITE_NAME').' - '.$section_title;

        // Get the images
        $team_member = TeamMember::where('id', $resource_id)->first();

        $data = [
            'page_title'     => $page_title,
            'section_title'  => $section_title,
            'resource'         => $team_member,
        ];

        return view("backend.webpages.team.team_member_singleview", $data);
    }

    public function updateResource(Request $request){
        $form_data = $request->all();

        $team_member = TeamMember::find($form_data['resource_id']);
        $team_member->name = $form_data['name'];
        $team_member->title = $form_data['title'];
        $team_member->linkedin = $form_data['linkedin'];
        $updated = $team_member->save();
        
        if($updated){
            if( $request->hasFile('tm-image') ) {
                

                // Remove all images first
                $deletedRows = TeamMemberImage::where('team_member_id', $team_member->id)->delete();
                $file_name = "";
                $file = $request->file('tm-image');
                $file_name = $this->uploadImage($file, $team_member->id);

                // If it was updated successfully we now change the url on the asset
                $team_member->image = $file_name;
                $team_member->save();

            }
            $message = "Team Member successfully updated";
            $request->session()->flash('success', $message);
            return redirect()->back()->withInput();
        }else{
            $message = "There was a technical error while updating the team_member";
            $request->session()->flash('failure', $message);
            return redirect()->back()->withInput();
        }


    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function deleteTeamMember(Request $request){
        $ajax_data = $request->all();


        // Delete from DB
        $uid = $ajax_data['resource_uid'];
        TeamMember::destroy($uid);
        // Delete image from Google Storage

        $response = SF::createResponse(1);
        return (json_encode($response));

    }

    public function randomLogoName($length_of_string)
    {
        // String of all alphanumeric character
        $orgininator = '23456789ABCDEFGHKMNPRSTWXYZ';

        // Shuffle the orgininator
        $str_result = substr(str_shuffle($orgininator),0, $length_of_string);

        // Check if the result exists already
        $exists = DB::table('team_members')->where('image', $str_result)->exists();

        // If it exists, shuffle again, else return what we got
        if($exists == true){
            $this->randomLogoName(8);
        }else{
            return $str_result;
        }

    }

    public function uploadImage($file, $team_member_id){

        $filename = "";

        $img = Image::make($file);
        $file_size_b = $img->filesize();
        $file_size_mb = $file_size_b / 1000000;

        if($file_size_mb > 2.0) {
            return SF::createResponse(0);
        }

        $document_root = $_SERVER['DOCUMENT_ROOT'];

        $filename = $file->getClientOriginalName();
        $file->move($document_root.'/images/team_images/', $filename);



        // $file_path = StaticFunctions::resourceStoragePath('slideshow_images').$filename;
        $file_path = TRUE;


        if($file_path) {

            $image = TeamMemberImage::create([
                'image_url'    => $filename,
                'team_member_id' => $team_member_id
            ]);

            if($image){
                return $filename;
            }

        }
    }
}
