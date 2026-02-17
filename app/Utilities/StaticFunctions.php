<?php


namespace App\Utilities;


class StaticFunctions
{
    public static function makeTitle($page, $section){
        $page_title = env('SITE_NAME').' - '.$page;
        $section_title = $section;

        $data = [
            'page_title' => $page_title,
            'section_title' => $section_title
        ];

        return $data;
    }

    /**
     * @param $status
     * @return array
     */

    public static function createResponse($status) {
        if($status == 1){
            $response = ['status'=>1, 'message'=>"Operation Successful"];
        }else{
            $response = ['status'=>0, 'message'=>"Operation Failed"];
        }

        return $response;
    }

    /**
     * @return string
     */
    public static function resourceStoragePath($folder_name){

        $public_storage = public_path();

        $folder_name = "/images".$folder_name."/";

        $folder_path = $public_storage.$folder_name;

        return $folder_path;

    }
}
