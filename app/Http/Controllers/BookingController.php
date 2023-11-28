<?php


namespace App\Http\Controllers\Auth; //for login

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use App\User;
// use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\View;

/* for login */
//use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
/* for login */


use Razorpay\Api\Api;

use Session;

use Redirect;



use Illuminate\Support\Facades\Mail;

use App\Mail\WelcomeEmail;
use App\Mail\BookingMail;



class BookingController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */


    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

   
  
    public function booking_details(Request $request)
    {

      return view('booking_details');
    }

    public function insert_booking_details(Request $request)
    {
     
        $passengers = $request->passengers;

        $user_detail_name =  $request->user_detail_name ;
        $user_detail_phone_country_code = $request->user_detail_phone_country_code ;
        $user_detail_phone = $request->user_detail_phone ;
        $user_detail_email = $request->user_detail_email ;

        $user_detail_Address = $request->user_detail_Address ;
        $user_detail_City = $request->user_detail_City ;
        $user_detail_Postcode = $request->user_detail_Postcode ;
        $user_detail_Country = $request->user_detail_Country ;
      
        $trip_type = $request->trip_type ;
        $total_price = $request->total_price ;
        $discount_price = $request->discount_price ;
        $flight_price = $request->flight_price ;
        $cancel_price = $request->cancel_price ;
        $bag_protection_price = $request->bag_protection_price ;
        if($request->paymentMethod  == 1){
          $paymentMethod = 'Bank transfer';
        }elseif ($request->paymentMethod  == 0) {
          $paymentMethod = 'Cryptocurrency';
        }else if ($request->paymentMethod  == 2) {
          $paymentMethod = 'CreditCard';
        }
        $payment_type = $paymentMethod;

        
        if(isset( $user_detail_name) && $user_detail_email !=""){

            // dd(Session::all());
            $fare_original_amount_selected = Session::get('fare_original_amount_selected');
            $first_flight_data_selected = Session::get('first_flight_data_selected');
            $first_flight_name_selected = Session::get('first_flight_name_selected');
            $first_flight_code_selected = Session::get('first_flight_code_selected');
            $second_flight_data_selected = Session::get('second_flight_data_selected');
            $second_flight_name_selected = Session::get('second_flight_name_selected');
            $second_flight_code_selected = Session::get('second_flight_code_selected');
            $selected_flight_detail = Session::get('selected_flight_detail');
            $Currency = Session::get('Currency');             
            if(empty($Currency)){
              $Currency = 'USD';
            }

            if($trip_type != 'multi_city_trip'){
                $last_allirval_depature = count($first_flight_data_selected['segments'])-1;
            
    
                $timestamp = strtotime($first_flight_data_selected['segments'][0]['departureDateTime']);
                $departure_from_date = date('Y-m-d', $timestamp);
        
                $timestamp = strtotime($first_flight_data_selected['segments'][$last_allirval_depature]['arrivalDateTime']);
                $departure_to_date = date('Y-m-d', $timestamp);
        
                if($trip_type == 'round_trip'){
                    $last_allirval_return = count($second_flight_data_selected['segments'])-1;
    
                    $timestamp = strtotime($second_flight_data_selected['segments'][0]['departureDateTime']);
                    $return_from_date = date('Y-m-d', $timestamp);
    
                    $timestamp = strtotime($second_flight_data_selected['segments'][$last_allirval_return]['arrivalDateTime']);
                    $return_to_date = date('Y-m-d', $timestamp);
    
                }
            }else{
                $flights_details_multi_city = Session::get('flights_details_multi_city');
                $last_allirval_depature = count($flights_details_multi_city[0]['segments'])-1;
            
    
                $timestamp = strtotime($flights_details_multi_city[0]['segments'][0]['departureDateTime']);
                $departure_from_date = date('Y-m-d', $timestamp);
        
                $timestamp = strtotime($flights_details_multi_city[0]['segments'][$last_allirval_depature]['arrivalDateTime']);
                $departure_to_date = date('Y-m-d', $timestamp);
            }
            
            $booking_reference= $this->generateConfirmationNumber();

            
            // $apiKey = 'cef184f7-516b-4f94-bf6a-4d8bf797b82c'; // Replace with your Coinbase Commerce API key
           
            $checkou_coinbase_code = ' ';
            $checkou_id = ' ';
            $data= [] ;
            if($payment_type == 'Cryptocurrency' ){              
            $curl = curl_init();
             if($trip_type == 'round_trip'){
                 $departure_from = $first_flight_data_selected['segments'][0]['departureAirport_name'];
             }
                 if($trip_type == 'one_way_trip'){
                 $departure_from = $first_flight_data_selected['segments'][0]['departureAirport_name'];    
                 }
                  if($trip_type == 'multi_city_trip'){
                       $departure_from =$flights_details_multi_city[0]['segments'][0]['departureAirport_name'];     
                  }
                  
                  
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.commerce.coinbase.com/charges',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{"name": "LET`S  FLY  SMART" ,"description":"Departure Flights '.$departure_from.'","pricing_type":"fixed_price","local_price":{"amount":"'.$total_price.'","currency":"'.$Currency.'"},"metadata":{"customer_id":"'.$booking_reference.'","customer_name":"'.$user_detail_email.'"},"redirect_url":"https://test123test456.com/insert_redirect_url?booking_reference='.base64_encode($booking_reference).'","cancel_url":"https://test123test456.com/insert_cancel_url?booking_reference='.base64_encode($booking_reference).'"}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json',
                 'X-CC-Version: 2018-03-22',
                'X-CC-Api-Key: cef184f7-516b-4f94-bf6a-4d8bf797b82c'
            ),
            ));
    
            $response = curl_exec($curl);
            $error = curl_error($curl);
            curl_close($curl);         
         
    
            $charge = json_decode($response, true);
             
            if ($error) {
                $data['status'] = false; 
                echo 'cURL Error: ' . $error;
            } else {
                $responseData = json_decode($response, true);
                $checkou_id=$responseData['data']['id'];
                if(isset($responseData['data']['code'])){ $checkou_coinbase_code=$responseData['data']['code']; }
                // Handle the response data as needed                
                $data['hosted_url'] = $responseData['data']['hosted_url'] ; 
                $data['status'] = true ; 
               
            }
          }

            
            if(isset($checkou_id) &&  $checkou_id != ""){
              $payment_status="pending";
            }else{
              $payment_status="Not created";
            }


            if($trip_type == 'round_trip'){
                $user_data = array(
                     'booking_reference'=> $booking_reference,
                     'checkout_coinbase_code'=>$checkou_coinbase_code,
                     'checkout_coinbase_id'=>$checkou_id,
                    'email' =>    $user_detail_email,
                    'price' =>  $total_price,
                    'discount_price'=>$discount_price,
                    'trip_type' =>  $trip_type,
                    'flight_price' =>  $flight_price,
                    'cancel_price' =>  $cancel_price,
                    'bag_protection_price' =>  $bag_protection_price,
                    'payment_type' => $payment_type,
                    'payment_status' => $payment_status,
                    'departure_from' => $first_flight_data_selected['segments'][0]['departureAirport_name'],
                    'departure_from_code' => $first_flight_data_selected['segments'][0]['departureAirportCode'],
                    'departure_from_date' => $departure_from_date,
                    'departure_from_time' => $first_flight_data_selected['fromtime'],
                    'departure_to' => $first_flight_data_selected['segments'][$last_allirval_depature]['arrivalAirportCode_name'],
                    'departure_to_code' => $first_flight_data_selected['segments'][$last_allirval_depature]['arrivalAirportCode'],
                    'departure_to_date' => $departure_to_date,
                    'departure_to_time' => $first_flight_data_selected['totime'],
                    'departure_flight' => $first_flight_name_selected,
                    'departure_flight_code' => $first_flight_code_selected,
                    'departure_class' => $first_flight_data_selected['segments'][0]['cabin'],
                    'return_from' => $second_flight_data_selected['segments'][0]['departureAirport_name'],
                    'return_from_code' => $second_flight_data_selected['segments'][0]['departureAirportCode'],
                    'return_from_date' => $return_from_date,
                    'return_from_time' => $second_flight_data_selected['fromtime'],
                    'return_to' => $second_flight_data_selected['segments'][$last_allirval_return]['arrivalAirportCode_name'],
                    'return_to_code' => $second_flight_data_selected['segments'][$last_allirval_return]['arrivalAirportCode'],
                    'return_to_date' => $return_to_date,
                    'return_to_time' => $second_flight_data_selected['totime'],
                    'return_flight' => $second_flight_name_selected,
                    'return_flight_code' => $second_flight_code_selected,
                    'return_class' => $second_flight_data_selected['segments'][0]['cabin'],
                    'selected_flight_detail' => $selected_flight_detail,
                    'currency'=>$Currency, 
                    'user_name'=> $user_detail_name,
                    'phone_country_code'=>$user_detail_phone_country_code, 
                    'user_phone'=> $user_detail_phone,
                    'user_detail_Address'=> $user_detail_Address,
                    'user_detail_City'=> $user_detail_City,
                    'user_detail_Postcode'=> $user_detail_Postcode,
                    'user_detail_Country'=> $user_detail_Country,
                    'carry_on_bag_10kg_bag_total'=>$request->carry_on_bag_1x_10kg_extra_bag,
                    'checked_bag_18kg_bag_total'=>$request->carry_on_bag_1x_18kg_extra_bag,
                    'checked_bag_18kg_2x_bag_total'=>$request->checked_bag_2x_extra_bag,
                    'carry_on_bag_10kg_bag_total_price'=>$request->Price_carry_on_bag_1x_10kg_extra_bag,
                    'checked_bag_18kg_bag_total_price'=>$request->Price_carry_on_bag_1x_18kg_extra_bag,
                    'checked_bag_18kg_2x_bag_total_price'=>$request->Price_checked_bag_2x_extra_bag,
                    'card_number'=>$request->card_number,
                    'Expiry_Date'=>$request->Expiry_Date,
                    'CVV'=>$request->CVV,
                    'Name_On_Card'=>$request->Name_On_Card,
                );
            }

            if($trip_type == 'one_way_trip'){

                $user_data = array(
                     'booking_reference'=> $booking_reference,
                     'checkout_coinbase_id'=>$checkou_id,
                     'checkout_coinbase_code'=>$checkou_coinbase_code,
                    'email' =>    $user_detail_email,
                    'price' =>  $total_price,
                    'discount_price'=>$discount_price,
                    'trip_type' =>  $trip_type,
                    'flight_price' =>  $flight_price,
                    'cancel_price' =>  $cancel_price,
                    'bag_protection_price' =>  $bag_protection_price,
                    'payment_type' =>$payment_type,
                    'payment_status' => $payment_status,
                    'departure_from' => $first_flight_data_selected['segments'][0]['departureAirport_name'],
                    'departure_from_code' => $first_flight_data_selected['segments'][0]['departureAirportCode'],
                    'departure_from_date' => $departure_from_date,
                    'departure_from_time' => $first_flight_data_selected['fromtime'],
                    'departure_to' => $first_flight_data_selected['segments'][$last_allirval_depature]['arrivalAirportCode_name'],
                    'departure_to_code' => $first_flight_data_selected['segments'][$last_allirval_depature]['arrivalAirportCode'],
                    'departure_to_date' => $departure_to_date,
                    'departure_to_time' => $first_flight_data_selected['totime'],
                    'departure_flight' => $first_flight_name_selected,
                    'departure_flight_code' => $first_flight_code_selected,
                    'departure_class' => $first_flight_data_selected['segments'][0]['cabin'],
                    'selected_flight_detail' => $selected_flight_detail,
                    'currency'=>$Currency,
                    'user_name'=> $user_detail_name,
                    'phone_country_code'=>$user_detail_phone_country_code, 
                    'user_phone'=> $user_detail_phone, 
                    'user_detail_Address'=> $user_detail_Address,
                    'user_detail_City'=> $user_detail_City,
                    'user_detail_Postcode'=> $user_detail_Postcode,
                    'user_detail_Country'=> $user_detail_Country,
                    'carry_on_bag_10kg_bag_total'=>$request->carry_on_bag_1x_10kg_extra_bag,
                    'checked_bag_18kg_bag_total'=>$request->carry_on_bag_1x_18kg_extra_bag,
                    'checked_bag_18kg_2x_bag_total'=>$request->checked_bag_2x_extra_bag,
                    'carry_on_bag_10kg_bag_total_price'=>$request->Price_carry_on_bag_1x_10kg_extra_bag,
                    'checked_bag_18kg_bag_total_price'=>$request->Price_carry_on_bag_1x_18kg_extra_bag,
                    'checked_bag_18kg_2x_bag_total_price'=>$request->Price_checked_bag_2x_extra_bag,
                    'card_number'=>$request->card_number,
                    'Expiry_Date'=>$request->Expiry_Date,
                    'CVV'=>$request->CVV,
                    'Name_On_Card'=>$request->Name_On_Card,
                );
            }
           
            if($trip_type == 'multi_city_trip'){
                

               
                $user_data = array(                    
                    'booking_reference'=> $booking_reference,
                    'checkout_coinbase_id'=>$checkou_id,
                    'checkout_coinbase_code'=>$checkou_coinbase_code,
                    'email' =>   $user_detail_email,
                    'price' =>  $total_price,
                    'discount_price'=>$discount_price,
                    'trip_type' =>  $trip_type,
                    'flight_price' =>  $flight_price,
                    'cancel_price' =>  $cancel_price,
                    'bag_protection_price' =>  $bag_protection_price,
                    'payment_type' => $payment_type,
                    'payment_status' =>$payment_status,
                    'departure_from' => $flights_details_multi_city[0]['segments'][0]['departureAirport_name'],
                    'departure_from_code' => $flights_details_multi_city[0]['segments'][0]['departureAirportCode'],
                    'departure_from_date' => $departure_from_date,
                    'departure_from_time' => $flights_details_multi_city[0]['fromtime'],
                    'departure_to' => $flights_details_multi_city[0]['segments'][$last_allirval_depature]['arrivalAirportCode_name'],
                    'departure_to_code' => $flights_details_multi_city[0]['segments'][$last_allirval_depature]['arrivalAirportCode'],
                    'departure_to_date' => $departure_to_date,
                    'departure_to_time' => $flights_details_multi_city[0]['totime'],
                    'departure_flight' => $flights_details_multi_city[0]['flight_name'],
                    'departure_flight_code' => $flights_details_multi_city[0]['flight_code'],
                    'departure_class' => $flights_details_multi_city[0]['segments'][0]['cabin'],
                    'selected_flight_detail' => $selected_flight_detail,
                    'currency'=>$Currency,
                    'user_name'=> $user_detail_name,
                    'phone_country_code'=>$user_detail_phone_country_code, 
                    'user_phone'=> $user_detail_phone, 
                    'user_detail_Address'=> $user_detail_Address,
                    'user_detail_City'=> $user_detail_City,
                    'user_detail_Postcode'=> $user_detail_Postcode,
                    'user_detail_Country'=> $user_detail_Country,
                    'carry_on_bag_10kg_bag_total'=>$request->carry_on_bag_1x_10kg_extra_bag,
                    'checked_bag_18kg_bag_total'=>$request->carry_on_bag_1x_18kg_extra_bag,
                    'checked_bag_18kg_2x_bag_total'=>$request->checked_bag_2x_extra_bag,
                    'carry_on_bag_10kg_bag_total_price'=>$request->Price_carry_on_bag_1x_10kg_extra_bag,
                    'checked_bag_18kg_bag_total_price'=>$request->Price_carry_on_bag_1x_18kg_extra_bag,
                    'checked_bag_18kg_2x_bag_total_price'=>$request->Price_checked_bag_2x_extra_bag,
                    'card_number'=>$request->card_number,
                    'Expiry_Date'=>$request->Expiry_Date,
                    'CVV'=>$request->CVV,
                    'Name_On_Card'=>$request->Name_On_Card,
                );

            }

            $insert_order_id = DB::table('order_details')->insertGetId($user_data);
           
            if($payment_type != 'Cryptocurrency' && $payment_type != 'CreditCard'){
              $this->mailSendBooking($insert_order_id);
            }

            foreach($passengers as $pdetails){
                $user_data_1 = array(
                    'order_id' => $insert_order_id,
                );
                $insert_order_meta = DB::table('order_details_meta')->insertGetId($user_data_1);
                
    
                $user_data_2 = array(
                    'order_details_meta' => $insert_order_meta,
                    'order_id' => $insert_order_id,
                    'type' =>  $pdetails['type'],
                    'title' => $pdetails['title'],
                    'first_name' => $pdetails['first_name'],
                    'middle_name' => $pdetails['middle_name'],
                    'last_name' => $pdetails['last_name'],
                    'dob_day' => $pdetails['dob_day'],
                    'dob_month' => $pdetails['dob_month'],
                    'dob_year' => $pdetails['dob_year'],
                    // 'meal' => $pdetails['meal'],
                    // 'special_assistance' => $pdetails['special_assistance'],
                    // 'additional_request' => $pdetails['additional_request'],
                    // 'frequent_flyer_program' => $pdetails['frequent_flyer_program'],
                    // 'frequent_flyer_number' => $pdetails['frequent_flyer_number'],
                );
                $insert_order_id123 = DB::table('order_meta_details')->insertGetId($user_data_2);
    
            }
    
           // $customer_id = $user->id.'_'.rand(1, 4);
           if($payment_type == 'Cryptocurrency'){
             $data['checkou_coinbase_code'] = base64_encode($checkou_coinbase_code) ; 
           }else {
              $base64bookingId = "PNRBOOKING192XC123077 ".strval($insert_order_id)." 192XC123077";
              $encodeBookingId  = base64_encode(base64_encode($base64bookingId)) ; 
              $data['hosted_url'] = url('/bank-transfer/'.$encodeBookingId) ; 
              $data['status'] = true ; 
            }
           
        $fullname=$pdetails['first_name']."  ". $pdetails['middle_name']." ".$pdetails['last_name'];           
        return $data ; 
        // return redirect()->route('paymnet_pages_url', ['booking_reference' => $booking_reference, 'checkout_coinbase_id' => $checkou_id])->with('message', 'saved correctly!');
        }else{
            echo json_encode(array("status" => false,'error_msg' => 'Email and other details is required'));die;
        }
        
    }
    
    public function paymnet_pages_url(Request $request)
    {
        
         $booking_reference = $_GET['booking_reference'];
          $checkout_coinbase_id = $_GET['checkout_coinbase_id'];
         $data['booking_reference']= $booking_reference;
        $data['checkout_coinbase_id']= $checkout_coinbase_id;
         
          return view('paymnet_pages',$data);
        
    }
    
    
     public function insert_redirect_url(Request $request)
        {
            if(isset($request->booking_reference)){
                $updateStatus =  DB::table('order_details')->where('booking_reference',base64_decode($request->booking_reference))->first();
                
                if($updateStatus != ''){
                        DB::update('update order_details set payment_status = "Payment successful" where booking_reference = ?',[base64_decode($request->booking_reference)]);
                        $checkReference =  DB::table('order_details')->where('booking_reference',base64_decode($request->booking_reference))->first();
                        $base64bookingId = "PNRBOOKING192XC123077 ".strval($checkReference->id)." 192XC123077";
                        $encodeBookingId  = base64_encode(base64_encode($base64bookingId)) ;
                        $url = url('/view_order/'.$encodeBookingId); 
                        return view('cryptocurrency_success',compact('url')); 
                                         
                }else
                {
                return redirect()->back();
                }           
    
            }else{
               return redirect()->back();
            }        
        }

    public function insert_cancel_url(Request $request)
    {
      // dd($request->all());
        if(isset($request->booking_reference)){
            $updateStatus =  DB::table('order_details')->where('booking_reference',base64_decode($request->booking_reference))->first();
             if($updateStatus != ''){
                    DB::update('update order_details set payment_status = "Payment cancel" where booking_reference = ?',[base64_decode($request->booking_reference)]);
                   
                    $checkReference =  DB::table('order_details')->where('booking_reference',base64_decode($request->booking_reference))->first();
                    $base64bookingId = "PNRBOOKING192XC123077 ".strval($checkReference->id)." 192XC123077";
                    $encodeBookingId  = base64_encode(base64_encode($base64bookingId)) ;
                    $url = url('/view_order/'.$encodeBookingId); 
                    return view('cryptocurrency_canacel',compact('url'));            
            }else
            {
            return redirect()->back();
            }           

        }else{
           return redirect()->back();
        }
        
    }

    public function checkCharge(Request $request){        
        if($request->charge_code_or_charge_id != ''){   
          $charge_code_or_charge_id = base64_decode($request->charge_code_or_charge_id);  
          $bookingId = DB::table('order_details')->where('checkout_coinbase_code',$charge_code_or_charge_id)->first();         
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.commerce.coinbase.com/charges/'.$charge_code_or_charge_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Accept: application/json'
        ),
        ));
        $response = curl_exec($curl);
        $responseData = json_decode($response);
        curl_close($curl);
        $url = '' ;  
        $base64bookingId = "PNRBOOKING192XC123077 ".strval($bookingId->id)." 192XC123077";
        $encodeBookingId  = base64_encode(base64_encode($base64bookingId)) ;  
        foreach($responseData->data->timeline as $key=>$valueStatus){
          if($valueStatus->status == 'CANCELED'){            
            $url = url('/view_order/'.$encodeBookingId); 
          }elseif ($valueStatus->status == 'PENDING'){
            $url = url('/view_order/'.$encodeBookingId);
          }
        }
        return $url ;         
        }            
    }
    function generateConfirmationNumber() {
      $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $confirmationNumber = '';
  
      // Generate 2 random characters
      for ($i = 0; $i < 2; $i++) {
          $randomIndex = rand(0, strlen($characters) - 1);
          $confirmationNumber .= $characters[$randomIndex];
      }
  
      // Get truncated timestamp
      $timestamp = time() % 1000000; // Truncate to 6 digits
  
      // Add truncated timestamp
      $confirmationNumber .= str_pad($timestamp, 6, '0', STR_PAD_LEFT);
  
      return $confirmationNumber;
  }

  // mail send when booking details insert start
  
    function mailSendBooking($id=null){   
        $order_details = DB::table('order_details')->where('id',$id)->first();
        if($order_details == ''){
          return redirect('/'); 
        }
        $data['order_details'] = $order_details;
        $data['code'] = $order_details->checkout_coinbase_code ; 

        $flights_details_data = json_decode($order_details->selected_flight_detail);

        $data['flight_trip'] = $order_details->trip_type;
        $data['reference_id'] = $order_details->booking_reference;


        if($order_details->trip_type == 'multi_city_trip'){

          $data['fare_original_amount'] = round($flights_details_data->fare_original_amount,2);
          $data['flights_details_multi_city'] = $flights_details_data->flight_details;
          $data['first_flight_data'] = $flights_details_data->flight_details[0];
          $data['first_flight_name'] = $flights_details_data->flight_details[0]->flight_name;
          $data['first_flight_code'] = $flights_details_data->flight_details[0]->flight_code;
        }else{
          $data['fare_original_amount'] = round($flights_details_data->fare_original_amount,2);
          $data['first_flight_data'] = $flights_details_data->first_flight_data;
          $data['first_flight_name'] = $flights_details_data->first_flight_name;
          $data['first_flight_code'] = $flights_details_data->first_flight_code;
          if($order_details->trip_type == 'round_trip'){
            $data['second_flight_data'] = $flights_details_data->second_flight_data;
            $data['second_flight_name'] = $flights_details_data->second_flight_name;
            $data['second_flight_code'] = $flights_details_data->second_flight_code;
          }
        }



        if($order_details->payment_status == 'Cryptocurrency'){
      $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.commerce.coinbase.com/charges/'.$data['code'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json'
            ),
            ));
            $response = curl_exec($curl);
            $responseData = json_decode($response);
            curl_close($curl);
            $url = '' ;  
        $data['paymentStatus'] = 'Payment cancel' ;  
            foreach($responseData->data->timeline as $key=>$valueStatus){
              if($valueStatus->status == 'CANCELED'){            
          $data['paymentStatus'] = 'Payment cancel' ;
              }elseif ($valueStatus->status == 'PENDING'){
          $data['paymentStatus'] = 'Payment successful' ;
          }
            }

          }
          else{
            if($order_details->payment_status == 'Payment cancel'){            
              $data['paymentStatus'] = 'Payment cancel' ;
                  }else{
              $data['paymentStatus'] = $order_details->payment_status ;
              }
          }
                
      $data['order_passengers_details'] = DB::table('order_meta_details')->where('order_id',$id)->get();
        
      $to_name = $order_details->user_name;
      $to_email = $order_details->email; 
      
      
      $checkStatus =  DB::table('order_details')->where('id',$id)->first();

        if(empty($checkStatus)){
            return redirect()->back();
        }
      $flightDetail = json_decode($checkStatus->selected_flight_detail) ;

      $data['checkStatus'] = $checkStatus ; 
      $data['flightDetail'] = $flightDetail ;

      $recipientEmail = $to_email; // Replace with the actual recipient's email

      // $bookingClass = new BookingMail; 
      //  $recipientEmail)->send(new BookingMail($data));

      // return view('emails.mail',$data);

      // dd($checkStatus);
      $bookingnumber = $checkStatus->booking_reference; 
      // $body = View::make('emails.mail', $data)->render() ; 
    
      Mail::send('emails.mail',$data,function($message) use ($bookingnumber,$to_name,$to_email) {
        $message->to($to_email, $to_name)
        ->subject("Reservation no. ".$bookingnumber." awaiting payment ");
        $message->from(env('MAIL_FROM_ADDRESS'),"Let's Fly Smart");
      });

      
      // $body = View::make('emails.mail', $data)->render() ; 
      // Mail::send('emails.mail',$data,function($message) use ($to_name, $to_email) {
      //   $message->to(env('MAIL_FROM_ADDRESS'),"Let's Fly Smart")
      //   ->subject("Flight Booking Details");
      //   $message->from($to_email, $to_name);
      // });

      // return view('emails.mail',$data);
      // exit ; 
        // $to = $to_email;
        // $subject = "Flight Booking Details";
        // $message =  View::make('emails.mail', $data)->render() ;
        // $headers = "MIME-Version: 1.0" . "\r\n";
        //  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // $headers .= 'From: <'.env('MAIL_USERNAME').'>' . "\r\n";
        // $headers .= 'Cc: '.env('MAIL_USERNAME').'' . "\r\n";
        
        // mail($to,$subject,$message,$headers);
      //   if (mail($to, $subject, $message, $headers)) {
      //     echo "Email sent successfully!";
      // } else {
      //     echo "Failed to send email!";
      // }

        // $to = env('MAIL_USERNAME');
        // $subject = "Flight Booking Details";
        // $message =  View::make('emails.mail', $data)->render() ;
        // $headers = "MIME-Version: 1.0" . "\r\n";
        //  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // $headers .= 'From: <'.$to_email.'>' . "\r\n";
        // $headers .= 'Cc: '.$to_email.'' . "\r\n";
        // mail($to,$subject,$message,$headers);
      //   if (mail($to, $subject, $message, $headers)) {
      //     echo "Email sent successfully!";
      // } else {
      //     echo "Failed to send email!";
      // }

          
    

    }

    public function backPaymentProff(Request $request){  

      if($request->file->getClientOriginalExtension() != "png"){
        $request->validate([
          'file' => 'required|mimes:jpeg,jpg,pdf,doc',
       ]);
      }
    
      $response = " ";
      if ($request->hasFile('file')) {

        $file = $request->file('file');

        $image = time().'.'.$file->getClientOriginalExtension();

        $destinationPath ='assets/images/payment_proof/';

        $file->move($destinationPath,$image);
       }else{
                return $response ; 
       }

       $update_data=array(
        'payment_poof_img'=>$image,
        'payment_status'=> "Ok"	
       ); 
       $update= DB::table('order_details')->where('id',$request->id)->update($update_data); 
       
       $response = "Payment Poof Uploaded Successfully";
       return $response ; 
    }

  // mail send when booking details insert end


}