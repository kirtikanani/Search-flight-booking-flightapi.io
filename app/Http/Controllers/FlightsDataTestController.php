<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use File;

use Razorpay\Api\Api;

use Session;

use Redirect;



use Illuminate\Support\Facades\Mail;

use App\Mail\WelcomeEmail;



class FlightsDataTestController extends Controller
{

    public function searchFlightsDetailsTest(Request $request){		
		$curl_handle = curl_init();
		
	 $url = 'https://api.flightapi.io/roundtrip/6565b4e4f019853bf9d05ec3/LHR/BCN/2023-07-18/2023-07-21/2/0/0/Economy/USD';
		//  $url = "https://api.flightapi.io/multicity/6565b4e4f019853bf9d05ec3/3/1/0/0/Economy/INR?dep1=SHA&arr1=YTO&date1=2023-06-29&&dep2=DFW&arr2=NYC&date2=2023-06-30&&dep3=NYC&arr3=SHA&date3=2023-06-28";
		// $url = "https://api.flightapi.io/roundtrip/6565b4e4f019853bf9d05ec3/".$departure_airport_code."/".$arrival_airport_code."/".$departure_date."/".$arrival_date."/".$number_of_adults."/".$number_of_childrens."/".$number_of_infants."/".$cabin_class."/INR";
		// Set the curl URL option
		curl_setopt($curl_handle, CURLOPT_URL, $url);

		// This option will return data as a string instead of direct output
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

		// Execute curl & store data in a variable
		$curl_data = curl_exec($curl_handle);
		curl_close($curl_handle);
		$tripId = [];
		$originalAmount = []; 
		$legIdsarray = [];  
		$flightsDetails= [] ;
		// Decode JSON into PHP array
		$response_data = json_decode($curl_data) ; 
		echo "<pre>" ; print_r($response_data); exit ; 
				echo "<pre>";
//	print_r($response_data);
//exit;

//print_r($faresdata);
/*
 $filter=$response_data->trips[0]->id;

$new_array = array_filter($faresdata, function($var) use ($filter){
    return ($var->tripId == $filter);
});
$faresdata=(array)$response_data->legs;
	echo "<pre>";
print_r($new_array);

 $filter=$response_data->trips[0]->legIds[0];

$new_array = array_filter($faresdata, function($var) use ($filter){
    return ($var->id == $filter);
});

	echo "<pre>";
print_r($new_array);


 $filter=$response_data->trips[0]->legIds[1];

$new_array = array_filter($faresdata, function($var) use ($filter){
    return ($var->id == $filter);
});


	echo "<pre>";
print_r($new_array);
$key=array_key_first($new_array);

$airlines=(array)$response_data->airlines;
	
	 $filter=$new_array[$key]->airlineCodes['0'];

$new_array = array_filter($airlines, function($var) use ($filter){
    return ($var->code == $filter);
});
	echo "<pre>";
print_r($new_array);
*/
		// exit ; 
		 
		 if(!empty($response_data) && !empty($response_data->trips)){
		    $faresdata=(array)$response_data->fares;
		    $airlines=(array)$response_data->airlines;
		     $airports=(array)$response_data->airports;
		    $legsdata=(array)$response_data->legs;
    	    foreach($response_data->trips as $tripdata){
    	        $filter=$tripdata->id;
    	        $fare_data = array_filter($faresdata, function($var) use ($filter){
                    return ($var->tripId == $filter);
                });
    	        
    	        
                 $filter=$tripdata->legIds[0];
                $first_flight_data = array_filter($legsdata, function($var) use ($filter){
                    return ($var->id == $filter);
                });
              
                $key_data=array_key_first($first_flight_data);
	             $filter=$first_flight_data[$key_data]->airlineCodes['0'];
	             $first_flight_name = array_filter($airlines, function($var) use ($filter){
	                 return ($var->code == $filter);
	             });
                
                
                 $segments=$first_flight_data[$key_data]->segments;
                 
                 foreach($segments as  $key=>$segments_data){
                    $departureAirportCode=$segments_data->departureAirportCode;
                    $departureAirport_name_array = array_filter($airports, function($var) use ($departureAirportCode){
	                    return ($var->code == $departureAirportCode);
	                });
	                
                    $key_departureAirportCode=array_key_first($departureAirport_name_array);
                    $first_flight_data[$key_data]->segments[$key]->departureAirport_name=$departureAirport_name_array[$key_departureAirportCode]->name;
                   
                    
                    
                    
                    $arrivalAirportCode=$segments_data->arrivalAirportCode;
                  $arrivalAirportCode_name_array= array_filter($airports, function($var) use ($arrivalAirportCode){
	                    return ($var->code == $arrivalAirportCode);
	                });
	                
	                 $key_arrivalAirportCode_name_array=array_key_first($arrivalAirportCode_name_array);
                    $first_flight_data[$key_data]->segments[$key]->arrivalAirportCode_name=$arrivalAirportCode_name_array[$key_arrivalAirportCode_name_array]->name;
                    
                 }
                 //print_r(  $first_flight_data[$key_data]->segments);
              //   print_r( $arrivalAirportCode_name);
               
                
                $filter=$tripdata->legIds[1];
                $second_flight_data = array_filter($legsdata, function($var) use ($filter){
                    return ($var->id == $filter);
                });
                
                
                
                 
                 
                
    	        $key_data=array_key_first($second_flight_data);
	             $filter=$second_flight_data[$key_data]->airlineCodes['0'];
	             $second_flight_details = array_filter($airlines, function($var) use ($filter){
	                 return ($var->code == $filter);
	             });
	             
	             $segments=$second_flight_data[$key_data]->segments;
                 
                 foreach($segments as  $key=>$segments_data){
                    $departureAirportCode=$segments_data->departureAirportCode;
                    $departureAirport_name_array = array_filter($airports, function($var) use ($departureAirportCode){
	                    return ($var->code == $departureAirportCode);
	                });
	                
                    $key_departureAirportCode=array_key_first($departureAirport_name_array);
                    $second_flight_data[$key_data]->segments[$key]->departureAirport_name=$departureAirport_name_array[$key_departureAirportCode]->name;
                   
                    
                    
                    
                    $arrivalAirportCode=$segments_data->arrivalAirportCode;
                  $arrivalAirportCode_name_array= array_filter($airports, function($var) use ($arrivalAirportCode){
	                    return ($var->code == $arrivalAirportCode);
	                });
	                
	                 $key_arrivalAirportCode_name_array=array_key_first($arrivalAirportCode_name_array);
                    $second_flight_data[$key_data]->segments[$key]->arrivalAirportCode_name=$arrivalAirportCode_name_array[$key_arrivalAirportCode_name_array]->name;
                    
                 }
                 
                 
	             
	             
	             $key_flight=array_key_first($first_flight_name);
	             $flight_name=$first_flight_name[$key_flight]->name;
	             $flight_code=$first_flight_name[$key_flight]->code;
	             
	              $key_flight_second=array_key_first($second_flight_details);
	             $second_flight_name=$second_flight_details[$key_flight_second]->name;
	             $second_flight_code=$second_flight_details[$key_flight_second]->code;
	             
	             
	             $dataoftrip[]=array('fare_amount'=>$fare_data,'first_flight_data'=>$first_flight_data,'first_flight_name'=>$flight_name,'first_flight_code'=>$flight_code,'second_flight_data'=>$second_flight_data,'second_flight_name'=> $second_flight_name,'second_flight_code'=> $second_flight_name);
	             
	             
    	        
        	}
        	print_r( $dataoftrip);
    	
    	    
    	}
		 
		 
	}

}


?>