<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class PlaygroundController extends Controller
{
    public function test() {

        Mail::to('kyalomajor@gmail.com')->send(new TestMail());

        return "ok";
    }

    public function testCert(){
        return "";
        // return view("backend.webpages.event.certificate_template");
        // return view('frontend.pages.test_cert');
        $data['co_trainer'] = "Co Trainer";
        $data['description'] = "Description";
        $data['lead_trainer'] = "Alfred Warui";
        $data['trainee'] = "Mr". " ". "First Name". " ". "Last Ame";
        $data['company'] = "Company";
        $data['email']   = "test@ww.ccc";
        $data['event_name']  = "Event name";

        PDF::setOptions(['dpi' => 150, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf = PDF::loadView('backend.webpages.event.certificate_template', $data)->setPaper('a3', 'landscape');
        
        return $pdf->download('cert.pdf');
        // return $pdf->stream();
        
        $path = storage_path('certificates/'."Event NAme");

        if(!File::isDirectory($path)){

            File::makeDirectory($path, 0777, true, true);
        }

        $pdf->save(storage_path('certificates/'."event_name".'/'.$data['trainee'].'.pdf'));
        return "ok";

    }

    public function carbon(){
        /*$mpesa_date = '20200829040611';
        $year = substr($mpesa_date, 0, 4);
        $month = substr($mpesa_date, 4, 2);
        $day = substr($mpesa_date, 6, 2);
        $hour = substr($mpesa_date, 8, 2);
        $min = substr($mpesa_date, 10, 2);
        $sec = substr($mpesa_date, 12, 2);
        $month_trimmed = ltrim($month, "0");

        $dt   = Carbon::create($year,$month_trimmed,$day,$hour,$min,$sec);
        $date = $dt->toDayDateTimeString();
         return $date;*/
        // dd(storage_path());

        dd(env('QUEUE_CONNECTION'));
    }
}
