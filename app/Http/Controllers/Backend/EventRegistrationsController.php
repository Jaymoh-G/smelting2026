<?php

namespace App\Http\Controllers\Backend;

require_once base_path('/vendor/FPDI/src/autoload.php');
require_once base_path('/vendor/fpdf/fpdf.php');
use App\Http\Controllers\Controller;
use App\Jobs\GenerateCertificate;
use App\Mail\Certificate;
use App\Mail\CertificateTest;
use App\Models\EventRegistration;
//use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Models\Event;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\DB;
use setasign\Fpdi\Fpdi;
use DateTime;


class EventRegistrationsController extends Controller
{
    public function index(Request $request){
        $page_title = env('SITE_NAME').' - Events';
        $section_title = 'Events';

        $resources = Event::orderBy('id', 'DESC')->paginate(6);

        $data = [
            'page_title' => $page_title,
            'section_title' => $section_title,
            'resources' => $resources
        ];

        return view("backend.webpages.event.all_events_registrations_index", $data);
    }

    public function viewRegistrations(Request $request, $id) {
        // Get event name
        $event = Event::where('id', $id)->firstorFail();
        // View all registrations ... Data Table?
        $page_title = env('SITE_NAME') . ' - Registrations for '.$event->title;
        $section_title = 'Registrations for '.$event->title;

        $data = [
            'page_title'        => $page_title,
            'section_title'     => $section_title
        ];

        if ($request->ajax()) {

            $model = $this->getSubscribersData($id);
            return DataTables::eloquent($model)
                ->filter(function ($query) {
                })
                ->toJson();
        }

        return view("backend.webpages.event.view_registrations", $data);

    }

    public function getSubscribersData($event_id){
        $query = EventRegistration::where('event_registrations.event_id', $event_id)
            ->leftJoin('event_payments',
            'event_payments.registrant_id', '=', 'event_registrations.id'
            )
            ->where('event_payments.payment_status', 1)
            ->select(['event_registrations.*', 'event_registrations.extra_fields AS extra',
                     'event_payments.payment_status',
                     'event_payments.PhoneNumber AS mpesa_phone'])
            ->latest('event_registrations.created_at');

        return $query;
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function issueCertificatesIndex(Request $request, $id){
        // Get event name
        $event = Event::where('id', $id)->first();
        // View all registrations ... Data Table?
        $page_title = env('SITE_NAME') . ' - Issue Certificates For '.$event->title;
        $section_title = 'Issue Certificates For '.$event->title;

        $data = [
            'page_title'     => $page_title,
            'section_title'  => $section_title,
            'eventName'     => $event->title,
            'event_id'       => $event->id,
            
        ];

        return view("backend.webpages.event.issue_certificates_index", $data);
    }
    
    // todo: delete the function below
    // public function generateCertificatesd(Request $request){
    //     // dd(base_path());
    //     $formData = $request->all();

    //     $event = Event::find($formData['event_id']);
    //     $eventName = $event->title;
    //     $registrations = EventRegistration::where('event_registrations.event_id', $event->id)
    //         ->join('event_payments',
    //         'event_payments.registrant_id', '=', 'event_registrations.id')
    //         ->where('event_payments.payment_status', 1)
    //         ->get();
    //     $registrations = json_encode($registrations);

    //     // $registration = EventRegistration::where('event_id', $formData['event_id'])->first();

    //     Log::info("Before dispatch");

    //     //  GenerateCertificate::dispatch($eventName, $registrations, $formData, $event);
    //     // GenerateCertificate::dispatch($eventName, $formData);

    //     $message = "Email Queue created to send certificates in the background";
    //     $request->session()->flash('success', $message);
    //     return redirect()->back()->withInput();

    // }
    
    public function generateCertificates(Request $request){
        $formData = $request->all();

        $event = Event::find($formData['event_id']);
        $registrations = EventRegistration::where('event_registrations.event_id', $event->id)
            ->join('event_payments',
            'event_payments.registrant_id', '=', 'event_registrations.id')
            ->where('event_payments.payment_status', 1)
            ->get();
            
        foreach($registrations as $registration){
            // check test mails
            $testEmails = ['waithera.maritim@gmail.com', 'stcmaritim@gmail.com', 'oscar.kipkoech@breezetech.co.ke', 'cmw20000@gmail.com', 'alfredwarui@gmail.com'];
            if (!in_array($registration->email_address, $testEmails)) continue;
            
            $data['co_trainer'] = 'Stacy Maritim';
            $data['description'] = $formData['description'];
            $data['lead_trainer'] = "Alfred Warui";
            $data['trainee'] = $registration->salutation. " ". $registration->first_name. " ". $registration->last_name;
            $data['company'] = $registration->company;
            $data['email']   = $registration->email_address;
            $data['eventName']   = $event->title;
            $data['id']   = $event->id; 
            $this->sendCertificates($data);
            Log::info('Sending certificate email...');
            Mail::to($data['email'])
                ->send(new Certificate($data));
            Log::info('Successfully mailed to: ' . $data['email']);
            
            DB::table('event_payments')
                ->where('registrant_id', $registration->id) 
                ->update([
                    'cert_sent_at' => Carbon::now()
                ]);
            Log::info('Successfully saved to DB...');
        }

        $message = "Email Queue created to send certificates in the background";
        $request->session()->flash('success', $message);
        return redirect()->back()->withInput();

    }
    
    private function sendCertificates($data){
        $templatePath = storage_path('certificates/template/certificate_template.pdf');
        $outputFolder = 'certificates/'.$data['id'];
        $outputPath = storage_path($outputFolder.'/'.$data['trainee'].'.pdf');
        if (!File::exists(storage_path($outputFolder))) {
            File::makeDirectory(storage_path($outputFolder), 0777, true, true);
        }
        
        // load the PDF template
        $pdf = new Fpdi();
        $pdf->setSourceFile($templatePath);
        $tplIdx = $pdf->importPage(1);
        $pdf->AddPage('L'); 
        $pdf->useTemplate($tplIdx, 0, 0, 297, 210);
        $pdf->AddFont('IMFellEnglishSC', '','imfellenglishsc.php');
        $pdf->SetFont('IMFellEnglishSC', '', 30);
        $pdf->SetTextColor(96, 71, 28);
        $pdf->SetXY($this->getTextX($pdf,$data['trainee']), 60);
        $pdf->Write(0, $data['trainee']);
        $pdf->SetFont('IMFellEnglishSC', '', 25);
        $pdf->SetXY($this->getTextX($pdf,$data['company']), 90);
        $pdf->Write(0, $data['company']);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->AddFont('Quattrocento', '','Quattrocento-Regular.php');
        $pdf->SetFont('Quattrocento', '', 15.5);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetXY($this->getTextX($pdf,$data['description']), 108);
        $pdf->Write(0, $data['description']);
        $pdf->SetFont('Quattrocento', '', $this->getEventNameFontSize($pdf,$data['eventName']));
        $pdf->SetXY($this->getTextX($pdf,$data['eventName']), 116);
        $pdf->Write(0, '"'.$data['eventName'].'"');
        $pdf->SetFont('Quattrocento', '', 15.5);
        $pdf->SetXY($this->getTextX($pdf,$this->getEventPeriod()), 124);
        $pdf->Write(0, $this->getEventPeriod());
        $pdf->Output($outputPath, 'F');
        return true;
    }
    
    private function getEventPeriod(){
        $startDate = '2024-04-16';
        $endDate = '2024-04-17';
        $start_date = new DateTime($startDate);
        $end_date = new DateTime($endDate);
        
        // Format start and end dates
        $start_formatted = $start_date->format('jS');
        $end_formatted = $end_date->format('jS');
        $month_year = $end_date->format('F Y');
        
        return "on $start_formatted - $end_formatted of $month_year";
    }
    
    private function getEventNameFontSize($pdf, $eventName){
        $eventNameFontSize = 15.5; // Default font size
        $maxEventNameWidth = 250; // Maximum width allowed for event name
        $eventNameWidth = $pdf->GetStringWidth($eventName);
        if ($eventNameWidth > $maxEventNameWidth) {
            $eventNameFontSize -= 0.5; // Decrease font size if the name is too long
        }
        return $eventNameFontSize;
    }
    
    private function getTextX($pdf, $eventName){
        $eventNameWidth = $pdf->GetStringWidth($eventName);
        return (297 - $eventNameWidth) / 2;
    }

}
