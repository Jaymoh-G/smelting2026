<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\EventPaymentReceipt;
use App\Models\EventPayment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventExtraFormField;
use App\Models\EventRegistration;
use Illuminate\Support\Facades\Mail;
use Log;

class EventsRegistrationsController extends Controller
{
    private function arr_to_str($arr) {
        $str = '';

        foreach ($arr as $key => $value) {
            $str .= "$key : $value;
            ";
        }

        return $str;
    } 

    public function index($id){
        $resource = Event::find($id);
        $extra_fields = EventExtraFormField::where('event_id', $id)->get();
  
        $data = [
            'page_title' => 'Register For Event',
            'countries' => NULL,
            'resource' => $resource,
            'extra_fields' => $extra_fields,
            
        ];

        return view('frontend.pages.event_register', $data);
    }

    public function store(Request $request){
        $form_data = $request->all();

        $event_id = $form_data['event_id'];
        $extra_fields = EventExtraFormField::where('event_id', $event_id)->get();

        $rules = [
            'salutation'    => 'required',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email_address' => 'required|email',
            'phone_number'  => 'required',
            'city'          => 'required',
            'company'       => 'required',
            'event_id'      => 'required',
        ];

        foreach ($extra_fields as $ef) {
            $field_name = \Str::slug($ef->name_of_form_field);
            if ($ef->is_required) {
                $rules[$field_name] = 'required';
            }
        }

        $request->validate($rules);

        $ef_arr = [];
        foreach($extra_fields as $ef) {
            $ef_arr[] = \Str::slug($ef->name_of_form_field);
        }

        $extra_data = [];
        foreach ($ef_arr as $extra) {
            $extra_data[$extra] = $form_data[$extra] ?? '';
        }

        // return json_encode($extra_data);

        $subscriber = EventRegistration::create(
            [
                'salutation'    => $form_data['salutation']??'',
                'first_name'    => $form_data['first_name']??'',
                'last_name'     => $form_data['last_name']??'',
                'email_address' => $form_data['email_address'],
                'phone_number'  => $form_data['phone_number'],
                'city'          => $form_data['city'],
                'company'       => $form_data['company'],
                'event_id'      => $form_data['event_id'],
                'message'       => $form_data['message'],
                'extra_fields'  => $this->arr_to_str($extra_data),
            ]
        );

        if($subscriber){
            // We need to redirect to the payments page with price information

            /*Log::info('Mail to be sent to '. $form_data['email_address']);
                Mail::to($form_data['email_address'])
                    ->send(new EventRegistrationCopy($subscriber));

            $request->session()->flash('success', "We have received you request we will get back to you soonest possible");
            return redirect()->back()->withInput();*/
            $resource = Event::find($form_data['event_id']);
            $data = [
                'page_title'    => 'Register For Event',
                'countries'     => NULL,
                'registrant_id' => $subscriber->id,
                'resource'      => $resource
            ];
            if($resource->pricingMode == 'paid'){
				return view('frontend.pages.payment_page', $data);
			}
			return view('frontend.pages.event_registration_successful', $data);	
        }

        // Store info in session then redirect to payments page


    }

    /**
     * @param $phone_number
     * @return false|string
     */
    public function sanitizePhoneNumber($phone_number){

        $final_number = substr($phone_number,-9);

        return $final_number;

    }

    public function takePayment(Request $request){
        $ajax_data = $request->all();

        // Sanitize Phone Number
        $phone_number_sanitized = $this->sanitizePhoneNumber($ajax_data['phone_number']);
        $full_phone_number      = "254".$phone_number_sanitized;

        $event                  = Event::find($ajax_data['resource']);
        $donation_amount        = $event->cost;
        $donation_amount = intval($donation_amount);

        // Invoke the MPESA API to Get the access token
        $consumer_key     = env('LIVE_CONSUMER_KEY');
        $consumer_secret  = env('LIVE_CONSUMER_SECRET');

        $credentials      = base64_encode( $consumer_key.":".$consumer_secret);
        // $url              = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        $url              = env('LIVE_CREDENTIALS_URL');
        $curl             = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $access_token  = json_decode($curl_response); // This is an object
        $ajax_response = NULL;

        if(!is_null($access_token)){
            $token = $access_token->access_token;
            $ttl   = $access_token->expires_in;

            $short_code = env('LIVE_SHORTCODE');
            $password = $this->getLipaNaMpesaPassword($short_code);

            $response_from_push_json = $this->invokeSTKPush($token, $password, $short_code, $full_phone_number, $donation_amount);
            $response_from_push = json_decode($response_from_push_json, true);
            
            if(!is_null($response_from_push)){
                $new_payment = EventPayment::create([
                    'registrant_id'  => $ajax_data['registrant_id'],
                    'event_id'       => $event->id,
                    'amount'         => $donation_amount,
                    'paying_phone'   => $full_phone_number,

                    // 'donor_email'   => ,
                    'MerchantRequestID'   => $response_from_push['MerchantRequestID'],
                    'CheckoutRequestID'   => $response_from_push['CheckoutRequestID'],
                    'ResponseCode'        => $response_from_push['ResponseCode'],
                    'CustomerMessage'     => $response_from_push['CustomerMessage']
                ]);
                $registrant = EventRegistration::find($ajax_data['registrant_id']);
				$resource = Event::find($event->id);
                $response = [
                    "Code" => "200",
                    "Description" => "Registration Successful",
                ];
                return json_encode($response);
            }else{
                $response = [
                    "Code" => "500",
                    "Description" => "Registration Failed",
                ];
                return json_encode($response);
            }

        }
    }

    /**
     * @param $token
     * @param $password
     * @param $short_code
     * @param $full_phone_number
     * @param $donation_amount
     * @return bool|string
     */
    protected function invokeSTKPush($token, $password, $short_code, $full_phone_number, $donation_amount){
        // $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $url = env('LIVE_STK_PUSH_URL');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$token));

        $curl_post_data = [
            //Fill in the request parameters with valid values
            'BusinessShortCode' => env('LIVE_SHORTCODE'),
            'Password'          => $password,
            'Timestamp'         => $this->getNowTimestamp(),
            'TransactionType'   => 'CustomerBuyGoodsOnline',
            'Amount'            => $donation_amount,
            'PartyA'            => $full_phone_number, // Max 12 digits in this format
            'PartyB'            => env('TILL_NUMBER'),
            'PhoneNumber'       => $full_phone_number, // Max 12 digits in this format
            'CallBackURL'       => env('LIVE_MPESA_API_STK_CALLBACK'),
            'AccountReference'  => "SmeltingAfrikaConsultants",
            'TransactionDesc'   => "Event Payment"
        ];

        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);

        return $curl_response;
    }

    /**
     * @param $short_code
     * @return string
     */
    protected function getLipaNaMpesaPassword($short_code){
        // $lipa_na_mpesa_online_passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919"; // Test
        $lipa_na_mpesa_online_passkey = env('LIVE_PASS_KEY'); // Live

        $date_time                    = $this->getNowTimestamp();
        // $date = Carbon::createFromFormat('Y-m-d H:i:s', $date_time, 'Africa/Nairobi')->addHours(3);

        // $password = base64.encode(Shortcode+Passkey+Timestamp)
        $password = base64_encode($short_code.$lipa_na_mpesa_online_passkey.$date_time);

        return $password;
    }

    protected function getNowTimestamp(){
        $now_ts              = Carbon::now()->timestamp;
        $nairobi_ts          = Carbon::parse($now_ts)->addHours(3);
        $date_time           = Carbon::parse($nairobi_ts)->format('YmdHis');

        return $date_time;
    }
}
