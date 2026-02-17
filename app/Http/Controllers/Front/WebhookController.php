<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormEmail;
use App\Mail\EventPaymentReceipt;
use App\Models\Cause;
use App\Models\Donation;
use App\Models\Event;
use App\Models\EventPayment;
use App\Models\EventRegistration;
use App\Scopes\DataOwnerScope;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Log;

class WebhookController extends Controller
{
    public function index(Request $request)
    {
        $form_data = $request->all();
        Log::info("FORM DATA");
        Log::info($form_data);

        // Once this receives data from Safaricom, how do we call Donations controller with some response
        // So that it sends a response back to the modal to notify user ??

        $CheckoutRequestID = $form_data['Body']['stkCallback']['CheckoutRequestID'];
        $ResultCode = $form_data['Body']['stkCallback']['ResultCode'];
        $ResultDesc = $form_data['Body']['stkCallback']['ResultDesc'];
        $CallbackMetadataItems = NULL;
        $ItemAmount            = NULL;
        $ItemReceipt           = NULL;
        $ItemTransactionDate   = NULL;
        $TransactionReceipt    = NULL;
        $transactionAmount     = NULL;
        $event_payment         = NULL;
        // If all went well when paying
        /*if(strcasecmp($ResultDesc, "The service request is processed successfully") == 0){

        }*/
        if($ResultCode == 0){
            $CallbackMetadataItems = $form_data['Body']['stkCallback']['CallbackMetadata']['Item'];
            Log::info('Meta data items: ' . json_encode($CallbackMetadataItems));
            if(count($CallbackMetadataItems) == 4){
                $ItemAmount          = $CallbackMetadataItems[0]; // amount
                $ItemReceipt         = $CallbackMetadataItems[1]; // M-PESA CODE
                // $ItemTransactionDate = $CallbackMetadataItems[3];
                $ItemTransactionDate = $CallbackMetadataItems[2];
                // $StkPhoneNumber      = $CallbackMetadataItems[4];
                $StkPhoneNumber      = $CallbackMetadataItems[3];
            }else{
                $ItemAmount          = $CallbackMetadataItems[0]; // amount
                $ItemReceipt         = $CallbackMetadataItems[1]; // M-PESA CODE
                $ItemTransactionDate = $CallbackMetadataItems[3];
                $StkPhoneNumber      = $CallbackMetadataItems[4];
            }
            $transactionAmount  = $ItemAmount['Value'];
            $TransactionReceipt = $ItemReceipt['Value'];
            $TransactionDate    = $ItemTransactionDate['Value'];
            $PayingPhone        = $StkPhoneNumber['Value'];
            $PayingPhone_Str = strval($PayingPhone);
            $TransactionDate_Str = strval($TransactionDate);
            $date_time = $this->mpesaDateToHumanReadable($TransactionDate_Str);

            // Get the cause where this CheckoutRequestID
            $event_payment = EventPayment::where('CheckoutRequestID', $CheckoutRequestID)->first();
            
            /*$event_payment->ResultCode = $ResultCode;
            $event_payment->ResultDesc = $ResultDesc;*/
            $event_payment->MpesaReceiptNumber = $TransactionReceipt;
            $event_payment->PhoneNumber        = $PayingPhone_Str;
            $event_payment->TransactionDate    = $date_time;
        }

        if(!is_null($TransactionReceipt)){
            $event_payment->payment_status = 1;
            $event_payment->save();

            $registration_id = $event_payment->registrant_id;
            $registrant = EventRegistration::find($registration_id);
            $email = $registrant->email_address;
            $mail_to_name = $registrant->first_name .' '. $registrant->last_name;

            // The event
            $event = Event::find($registrant->event_id);
            
            $data = [
			    'name'    => $registrant->first_name . ' ' . $registrant->last_name,
				'first_name'    => $registrant->first_name??'',
				'amount'        => $transactionAmount,
				'receipt_number'     => $TransactionReceipt,
				'payment_date' => date('Y-m-d H:i:s'),
				'event_name' => $event->title ?? '',
			];
            
			$mail = new EventPaymentReceipt($data); 
            Mail::to($registrant->email_address)->bcc(['smeltingafrika@gmail.com','oscar.kipkoech@breezetech.co.ke'])->send($mail);
            Log::info('Payment receipt sent to : '. $registrant->email_address);
        }

    }

    public function convertMPESADateTODbDate($mpesa_date){
        // 2020-08-29 04-06-11
        $year = substr($mpesa_date, 0, 4);
        $month = substr($mpesa_date, 4, 2);
        $day = substr($mpesa_date, 6, 2);
        $hour = substr($mpesa_date, 8, 2);
        $min = substr($mpesa_date, 10, 2);
        $sec = substr($mpesa_date, 12, 2);

        $db_date = $year."-".$month."-".$day." ".$hour.":".$min.":".$sec;
        return $db_date;
    }

    public function mpesaDateToHumanReadable($mpesa_date){
        $year = substr($mpesa_date, 0, 4);
        $month = substr($mpesa_date, 4, 2);
        $day = substr($mpesa_date, 6, 2);
        $hour = substr($mpesa_date, 8, 2);
        $min = substr($mpesa_date, 10, 2);
        $sec = substr($mpesa_date, 12, 2);
        $month_trimmed = ltrim($month, "0");

        $dt   = Carbon::create($year,$month_trimmed,$day,$hour,$min,$sec);
        $date = $dt->toDayDateTimeString();
        return $date;
    }

}
