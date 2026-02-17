<?php
namespace App\Jobs;

require_once base_path('/vendor/FPDI/src/autoload.php');
require_once base_path('/vendor/fpdf/fpdf.php');

use App\Mail\Certificate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;
// use Barryvdh\DomPDF\Facade\PDF;
// use Barryvdh\DomPDF\PDF as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
// use File;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use setasign\Fpdi\Fpdi;
use DateTime;

class GenerateCertificate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected  $event_name;
    protected  $registrations;
    protected  $form_data;
    protected $email;
    protected $company;
    protected $event;


    /**
     * GenerateCertificate constructor.
     * @param $event_name
     * @param $registrations
     * @param $form_data
     */
    public function __construct($event_name, $registrations, $form_data, $event)
    {
        $this->registrations = $registrations;
        $this->event_name    = $event_name;
        $this->form_data     = $form_data;
        $this->event     = $event;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
     
     public function handle()
    {
        Log::info("PDF generation starting...");
        $registrations_object = json_decode($this->registrations);
        Log::info("REGS OBJECT ON JOB HANDLE");
        foreach ($registrations_object as $registration) {
            // $certSent = DB::table('event_payments')
            //         ->where('registrant_id', $registration->id)
            //         ->whereNotNull('cert_sent_at')
            //         ->first();
            // if ($certSent) {
            //     $message = "Attempted to generate certificate for email: " . $registration->email_address . ", user already received certificate on: " . $certSent->cert_sent_at;
            //     Log::info($message);
            //     // Mail::to('oscar.kipkoech@breezetech.co.ke')
            //     //     ->from('no-reply@smeltingafrika.co.ke', 'Smelting Afrika')
            //     //     ->subject('Certificate Already Sent')
            //     //     ->send($message);
            //     continue;
            // }
            
            $data['co_trainer'] = 'Stacy Maritim';
            $data['description'] = $this->form_data['description'];
            $data['lead_trainer'] = "Alfred Warui";
            $data['trainee'] = $registration->salutation. " ". $registration->first_name. " ". $registration->last_name;
            $data['company'] = $registration->company;
            $data['email']   = $registration->email_address;
            $data['event_name']   = $this->event_name;
            
            // check test mails
            $testEmails = ['waithera.maritim@gmail.com', 'stcmaritim@gmail.com', 'oscar.kipkoech@breezetech.co.ke'];
            if (!in_array($data['email'], $testEmails)) continue;
            
            $templatePath = storage_path('certificates/template/certificate_template.pdf');
            $outputFolder = 'certificates/'.$this->event_name;
            $outputPath = storage_path($outputFolder.'/'.$data['trainee'].'.pdf');
            if (!File::exists(storage_path($outputFolder))) {
                File::makeDirectory(storage_path($outputFolder), 0777, true, true);
            }
            $pdf = new Fpdi();
            $pdf->setSourceFile($templatePath);
            $tplIdx = $pdf->importPage(1);
            $pdf->AddPage('L'); 
            $pdf->useTemplate($tplIdx, 0, 0, 297, 210);
            $pdf->AddFont('IMFellEnglishSC', '','imfellenglishsc.php');
            $pdf->SetFont('IMFellEnglishSC', '', 30);
            $pdf->SetTextColor(96, 71, 28);
            $pdf->SetXY(110, 60);
            $pdf->Write(0, $data['trainee']);
            $pdf->SetXY(120, 90);
            $pdf->SetFont('IMFellEnglishSC', '', 25);
            $pdf->Write(0, $data['company']);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->SetXY(78, 108);
            $pdf->AddFont('Quattrocento', '','Quattrocento-Regular.php');
            $pdf->SetFont('Quattrocento', '', 15.5);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Write(0, 'for attending the NCA-approved virtual training entitled');
            $pdf->SetXY(60, 116);
            $pdf->Write(0, '"'.$data['event_name'].'"');
            $pdf->SetXY(105, 124);
            $pdf->Write(0, 'on '. $this->getEventPeriod());
            $pdf->Output($outputPath, 'F');
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
    }
    
    private function getEventPeriod(){
        $start_date = new DateTime($this->event->start_date);
        $end_date = new DateTime($this->event->end_date);
        
        // Format start and end dates
        $start_formatted = $start_date->format('jS');
        $end_formatted = $end_date->format('jS');
        $month_year = $end_date->format('F Y');
        
        return "$start_formatted - $end_formatted of $month_year";
    }
    
    public function retryUntil()
    {
        return now()->addMinutes(60);
    }
}
