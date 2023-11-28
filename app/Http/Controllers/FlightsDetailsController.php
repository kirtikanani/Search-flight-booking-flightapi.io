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



class FlightsDetailsController extends Controller
{

	// created function for checked country , state , city is valid ip address   
	public function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
		$output = NULL;
		if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
			$ip = $_SERVER["REMOTE_ADDR"];
			if ($deep_detect) {
				if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
					$ip = $_SERVER['HTTP_CLIENT_IP'];
			}
		}
		$purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
		$support    = array("country", "countrycode", "state", "region", "city", "location", "address");
		$continents = array(
			"AF" => "Africa",
			"AN" => "Antarctica",
			"AS" => "Asia",
			"EU" => "Europe",
			"OC" => "Australia (Oceania)",
			"NA" => "North America",
			"SA" => "South America"
		);
		if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
			$ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
			if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
				switch ($purpose) {
					case "location":
						$output = array(
							"city"           => @$ipdat->geoplugin_city,
							"state"          => @$ipdat->geoplugin_regionName,
							"country"        => @$ipdat->geoplugin_countryName,
							"country_code"   => @$ipdat->geoplugin_countryCode,
							"continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
							"continent_code" => @$ipdat->geoplugin_continentCode
						);
						break;
					case "address":
						$address = array($ipdat->geoplugin_countryName);
						if (@strlen($ipdat->geoplugin_regionName) >= 1)
							$address[] = $ipdat->geoplugin_regionName;
						if (@strlen($ipdat->geoplugin_city) >= 1)
							$address[] = $ipdat->geoplugin_city;
						$output = implode(", ", array_reverse($address));
						break;
					case "city":
						$output = @$ipdat->geoplugin_city;
						break;
					case "state":
						$output = @$ipdat->geoplugin_regionName;
						break;
					case "region":
						$output = @$ipdat->geoplugin_regionName;
						break;
					case "country":
						$output = @$ipdat->geoplugin_countryName;
						break;
					case "countrycode":
						$output = @$ipdat->geoplugin_countryCode;
						break;
				}
			}
		}
		return $output;
	}
	// create function for get current system ip location 
	public function get_client_ip() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
		   $ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}


    //create function for onload to get first round trip page display start
	public function searchFlightsPage(Request $request){
		if($request->datetimes == null){
			$request->datetimes = date('Y-m-d', strtotime(' +1 day')).' - '.date('Y-m-d', strtotime(' +1 day')); 
		}

		$explodedate = explode(' - ',$request->datetimes);
		if(isset($explodedate[1])){
			if(date('Y-m-d', strtotime(' +1 day')) == date('Y-m-d', strtotime($explodedate[1] .' +1 day')) ){
				$datetimesarray = [] ; 
				$datetimesarray[0] =  $explodedate[0] ;
				$datetimesarray[1] =  date('Y-m-d', strtotime($explodedate[1] .' +1 day'));
				$request->datetimes = implode(' - ',$datetimesarray);
			}
		}
		
		$request = $request; 
		$Currency = $request->Currency ; 
		$originalAmount = [] ; 
		return view('search-flights',compact('originalAmount','request','Currency'));
	}
	//create function for onload to get first round trip page display end

	// create function for onload to get round trip searched flight list start
	public function searchFlightsDetails(Request $request)
    {  
		// check Currency  start 
			$user_locastion= $this->ip_info($this->get_client_ip(), "Location");
				$Currency = 'USD' ;  
				if(!empty($user_locastion)){
					if($user_locastion['continent']=="Europe"){
					$Currency = 'EUR';    
					}elseif($user_locastion['continent']=="North America"){
						$Currency = 'USD';  
					}elseif($user_locastion['country']=="Australia"){
						$Currency = 'AUD';  
					}elseif($user_locastion['country']=="United Arab Emirates"){
						$Currency = 'AED';  
					}                 
				}
			
			if(isset($request->Currency)){
				$Currency = $request->Currency ; 
			}
		// check Currency  end 

		$datetimes = explode(' - ',$request->datetimes);
		$departure_airport_code = $request->wherefrom_shortname;
		$arrival_airport_code = $request->whereto_shortname;
		$departure_date = date_format(date_create($datetimes[0]),"Y-m-d");
		$arrival_date = date_format(date_create($datetimes[1]),"Y-m-d");
		$number_of_adults = $request->adults; 
		$number_of_childrens = $request->children; 
		$number_of_infants = $request->infants; 
		$cabin_class= $request->cabin_class;		
		$session_departure_airport_code = $request->session()->get('departure_airport_code') ; 
		$session_arrival_airport_code =$request->session()->get('arrival_airport_code');

		if($request->session()->get('trip_type') != 'round_trip'){
			$request->session()->flush();
		}

		if($session_departure_airport_code != $departure_airport_code || $session_arrival_airport_code != $arrival_airport_code || $departure_date != $request->session()->get('departure_date') || $arrival_date != $request->session()->get('arrival_date') 
		|| $arrival_date != $request->session()->get('arrival_date') || $number_of_adults != $request->session()->get('number_of_adults') || $number_of_childrens != $request->session()->get('number_of_childrens')
		|| $number_of_infants != $request->session()->get('number_of_infants') || $cabin_class != $request->session()->get('cabin_class') || $Currency != $request->session()->get('Currency')
		){ 
			$request->session()->put('Currency',$Currency);
			$request->session()->put('trip_type','round_trip');
			$request->session()->put('departure_airport_code',$departure_airport_code);
			$request->session()->put('arrival_airport_code',$arrival_airport_code);

			$request->session()->put('departure_date',$departure_date);
			$request->session()->put('arrival_date',$arrival_date);
			$request->session()->put('number_of_adults',$number_of_adults);
			$request->session()->put('number_of_childrens',$number_of_childrens);
			$request->session()->put('number_of_infants',$number_of_infants);
			$request->session()->put('cabin_class',$cabin_class);
			$request->session()->save();

		// curl api call for get flight details start 
		$curl_handle = curl_init();
		$url = "https://api.flightapi.io/roundtrip/6565b4e4f019853bf9d05ec3/".$departure_airport_code."/".$arrival_airport_code."/".$departure_date."/".$arrival_date."/".$number_of_adults."/".$number_of_childrens."/".$number_of_infants."/".$cabin_class."/".$Currency."/?offset=0&limit=20";
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
		$withoutDiscountPrice = [] ; 
		// Decode JSON into PHP array
		$response_data1 = json_decode($curl_data) ; 	
			
		if(!empty($response_data1->trips)){
			$sizrof_response_data1=sizeof($response_data1->trips);
		}
		

		$curl_handle = curl_init();
	 	$url = "https://api.flightapi.io/roundtrip/6565b4e4f019853bf9d05ec3/".$departure_airport_code."/".$arrival_airport_code."/".$departure_date."/".$arrival_date."/".$number_of_adults."/".$number_of_childrens."/".$number_of_infants."/".$cabin_class."/".$Currency;
		// Set the curl URL option
		curl_setopt($curl_handle, CURLOPT_URL, $url);
		// This option will return data as a string instead of direct output
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
		// Execute curl & store data in a variable
		$curl_data = curl_exec($curl_handle);
		curl_close($curl_handle); 
			$response_data2 = json_decode($curl_data);	

			$response_data = $response_data1;

			if(!empty($response_data1->trips)){
				$sizrof_response_data2=sizeof($response_data2->trips);

			if($sizrof_response_data2 >	$sizrof_response_data1){
			    $response_data=$response_data2;
			}else{
			   $response_data=$response_data1;
			}

			}	
		// curl api call for get flight details end 
		$dataoftrip = [];	
		$cheapestArr = [] ; 	
		$quickestArr = [] ; 
		$recommendedArr = [] ;  
		$allianceCodes = [] ; 
		// Decode JSON into PHP array
		 
		if(!empty($response_data) && !empty($response_data->trips)){
		    $faresdata=(array)$response_data->fares;
			$airlines=(array)$response_data->airlines;			
			$airports=(array)$response_data->airports;
			$legsdata=(array)$response_data->legs;
			$filtertripDurations = 0; 
			$discount = DB::table('ecommerce_setting')->first();
			$discountPre = 0 ; 
			if(!empty($discount)){
				// dd($cabin_class );
				if($cabin_class == 'Economy' || $cabin_class == 'Premium_Economy'){
					$discountPre = $discount->discount ;
				}else{
					$discountPre = $discount->discount_for_business_and_first_class ;
				}
			}
    	    foreach($response_data->trips as $tripKey=>$tripdata){
				
    	        $filter=$tripdata->id;
    	        $fare_data = array_filter($faresdata, function($var) use ($filter){
                    return ($var->tripId == $filter);
				});
				
				$fare_key =  array_key_first($fare_data) ;
				$originalAmountDiscountPrice = ($fare_data[$fare_key]->price->originalAmount*$discountPre)/100 ; 
				$originalAmount =  round($fare_data[$fare_key]->price->originalAmount - $originalAmountDiscountPrice,2) ;
				$withoutDiscountPrice = round($fare_data[$fare_key]->price->originalAmount,2);
			
    	        // first flight  details start
					$filter=$tripdata->legIds[0];
					$first_flight_data = array_filter($legsdata, function($var) use ($filter){
						return ($var->id == $filter);
					}); 
					// echo"<pre>"	;print_r($first_flight_data) ; 
				
					$key_data_first=array_key_first($first_flight_data);
					$filter=$first_flight_data[$key_data_first]->airlineCodes['0'];
					$first_flight_name = array_filter($airlines, function($var) use ($filter){
						return ($var->code == $filter);
					});
					
					$segments=$first_flight_data[$key_data_first]->segments;
					
					foreach($segments as  $key=>$segments_data){
						$departureAirportCode=$segments_data->departureAirportCode;
						$departureAirport_name_array = array_filter($airports, function($var) use ($departureAirportCode){
							return ($var->code == $departureAirportCode);
						});
						
						$key_departureAirportCode=array_key_first($departureAirport_name_array);
						$first_flight_data[$key_data_first]->segments[$key]->departureAirport_name=$departureAirport_name_array[$key_departureAirportCode]->name;
					
						$arrivalAirportCode=$segments_data->arrivalAirportCode;
					$arrivalAirportCode_name_array= array_filter($airports, function($var) use ($arrivalAirportCode){
							return ($var->code == $arrivalAirportCode);
						});
						
						$key_arrivalAirportCode_name_array=array_key_first($arrivalAirportCode_name_array);
						$first_flight_data[$key_data_first]->segments[$key]->arrivalAirportCode_name=$arrivalAirportCode_name_array[$key_arrivalAirportCode_name_array]->name;
						
					}
					$formdate = date_create($first_flight_data[$key_data_first]->departureDateTime); 
					$todate = date_create($first_flight_data[$key_data_first]->arrivalDateTime) ; 
					$first_flight = []; 
					if(isset($first_flight_data[$key_data_first]->allianceCodes[0])){
						$allianceCodes[] = 	$first_flight_data[$key_data_first]->allianceCodes[0];
						$first_flight['allianceCodes'] = $first_flight_data[$key_data_first]->allianceCodes[0]; 
					}
			
					$first_flight['fromDate'] = date_format($formdate,"D M d");
					$first_flight['toDate'] = date_format($todate,"D M d");
					$first_flight['fromtime'] = date_format($formdate," g:ia");
					$first_flight['totime'] = date_format($todate,"g:ia");
					$first_flight['stopoverCode'] =$first_flight_data[$key_data_first]->stopoverCode; 
					$first_flight['duration'] = $first_flight_data[$key_data_first]->duration ; 
					$first_flight['stopoverDuration'] = $first_flight_data[$key_data_first]->stopoverDuration ; 
					$first_flight['segments']= $first_flight_data[$key_data_first]->segments;
				// first flight  details start end

				// second flight  details start 
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
					
					$formdate = date_create($second_flight_data[$key_data]->departureDateTime); 
					$todate = date_create($second_flight_data[$key_data]->arrivalDateTime) ; 
					$second_flight = [];
					$second_flight['fromDate'] = date_format($formdate,"D M d");
					$second_flight['toDate'] = date_format($todate,"D M d");
					$second_flight['fromtime'] = date_format($formdate," g:ia");
					$second_flight['totime'] = date_format($todate,"g:ia");
					$second_flight['stopoverCode'] =$second_flight_data[$key_data]->stopoverCode; 
					$second_flight['duration'] = $second_flight_data[$key_data]->duration ; 
					$second_flight['stopoverDuration'] = $second_flight_data[$key_data]->stopoverDuration ;
					$second_flight['segments']= $second_flight_data[$key_data]->segments;				
				// second flight  details end 

				// first flight name and code 
					$key_flight=array_key_first($first_flight_name);
	            	$flight_name=$first_flight_name[$key_flight]->name;
				 	$flight_code=$first_flight_name[$key_flight]->code;
				// first flight name and code end
				 
				// second flight name and code start
	            	$key_flight_second=array_key_first($second_flight_details);
	             	$second_flight_name=$second_flight_details[$key_flight_second]->name;
				 	$second_flight_code=$second_flight_details[$key_flight_second]->code;
				// second flight name and code 	end

				 $originalAmountDiscountPrice = ($response_data->filters->minPrice->originalAmount*$discountPre)/100 ; 
				 
				 // cheapestArr amount and time get start 
					if(round($response_data->filters->minPrice->originalAmount - $originalAmountDiscountPrice,2) == $originalAmount){
						$cheapestArr['amount'] = $Currency.' '.$originalAmount ; 
						// Start time (hours and minutes)
						$getTime  = explode(' ',$first_flight_data[$key_data_first]->duration); 
						$start_hours = (int)str_replace('h','',$getTime[0]);
						$start_minutes = 0 ; 
						if(count($getTime) == 2){
							$start_minutes = (int)str_replace('m','',$getTime[1]);
						}
						$start_hours = $start_hours;
						$start_minutes = $start_minutes;

					// End time (hours and minutes)
						// $getTime  = explode(' ',$second_flight_data[$key_data]->duration); 
						// $end_hours = (int)str_replace('h','',$getTime[0]);
						// $end_minutes = 0 ; 
						// if(count($getTime) == 2){
						// 	$end_minutes = (int)str_replace('m','',$getTime[1]);
						// }
						// $end_hours = $end_hours;
						// $end_minutes = $end_minutes;

						// Convert start and end times to minutes
						$start_total_minutes = ($start_hours * 60) + $start_minutes;
						// $end_total_minutes = ($end_hours * 60) + $end_minutes;

						// Calculate the total time duration in minutes
						$total_duration_minutes = $start_total_minutes;

						// Convert the total duration back to hours and minutes
						$total_hours = floor($total_duration_minutes / 60);
						$total_minutes = $total_duration_minutes % 60;
						
						$cheapestArr['time'] = round($total_hours)."h ".round($total_minutes)."m" ; 
					}
 				// cheapestArr amount and time get end 

				// quickestArr amount and time get start 
					
				// Start time (hours and minutes)
					$getTime  = explode(' ',$first_flight_data[$key_data_first]->duration); 
					$start_hours = (int)str_replace('h','',$getTime[0]);
					$start_minutes = 0 ; 
					if(count($getTime) == 2){
						$start_minutes = (int)str_replace('m','',$getTime[1]);
					}
					$start_hours = $start_hours;
					$start_minutes = $start_minutes;

				// End time (hours and minutes)
					// $getTime  = explode(' ',$second_flight_data[$key_data]->duration); 
					// $end_hours = (int)str_replace('h','',$getTime[0]);
					// $end_minutes = 0 ; 
					// if(count($getTime) == 2){
					// 	$end_minutes = (int)str_replace('m','',$getTime[1]);
					// }
					// $end_hours = $end_hours;
					// $end_minutes = $end_minutes;

					// Convert start and end times to minutes
					$start_total_minutes = ($start_hours * 60) + $start_minutes;
					// $end_total_minutes = ($end_hours * 60) + $end_minutes;

					// Calculate the total time duration in minutes
					$total_duration_minutes = $start_total_minutes;

					// Convert the total duration back to hours and minutes
					$total_hours = floor($total_duration_minutes / 60);
					$total_minutes = $total_duration_minutes % 60;
					  
					$quickestArr['time'][] = $total_duration_minutes; 
					$quickestArr['quickesttime'][$start_total_minutes] = round($total_hours).'h '.round($total_minutes).'m ';  
					$quickestArr['amount'][$start_total_minutes] = $Currency.' '.$originalAmount; 
				// quickestArr amount and time get end

				// recommendedArr amount and time get start
				if($tripKey == 0){					
					// Start time (hours and minutes)
					$getTime  = explode(' ',$first_flight_data[$key_data_first]->duration); 
					$start_hours = (int)str_replace('h','',$getTime[0]);
					$start_minutes = 0 ; 
					if(count($getTime) == 2){
						$start_minutes = (int)str_replace('m','',$getTime[1]);
					}
					$start_hours = $start_hours;
					$start_minutes = $start_minutes;

				// End time (hours and minutes)
					// $getTime  = explode(' ',$second_flight_data[$key_data]->duration); 
					// $end_hours = (int)str_replace('h','',$getTime[0]);
					// $end_minutes = 0 ; 
					// if(count($getTime) == 2){
					// 	$end_minutes = (int)str_replace('m','',$getTime[1]);
					// }
					// $end_hours = $end_hours;
					// $end_minutes = $end_minutes;

					// Convert start and end times to minutes
					$start_total_minutes = ($start_hours * 60) + $start_minutes;
					// $end_total_minutes = ($end_hours * 60) + $end_minutes;

					// Calculate the total time duration in minutes
					$total_duration_minutes = $start_total_minutes;

					// Convert the total duration back to hours and minutes
					$total_hours = floor($total_duration_minutes / 60);
					$total_minutes = $total_duration_minutes % 60;

					$recommendedArr['time'] = round($total_hours).'h '.round($total_minutes).'m ';
					$recommendedArr['amount']= $Currency.' '.$originalAmount ;					
				}
				// recommendedArr amount and time get end
				 
				 $dataoftrip[]=array('fare_original_amount'=>$originalAmount,'withoutDiscountPrice'=>$withoutDiscountPrice,'first_flight_data'=>$first_flight,'first_flight_name'=>$flight_name,'first_flight_code'=>$flight_code,'second_flight_data'=>$second_flight,'second_flight_name'=> $second_flight_name,'second_flight_code'=> $second_flight_code);
				 
				 $tripKey = $tripKey +1 ;
				}
				// exit ; 
				$nullArray = [] ; 
				$allianceResult = array_merge($nullArray ,array_unique($allianceCodes)) ;
				$countingTrip = $tripKey ;

				// quickestArr price and time get start 
				$qst_time= min($quickestArr['time']) ;
				$quickestArr['time'] = $quickestArr['quickesttime'][$qst_time] ; 
				$quickestArr['amount'] = $quickestArr['amount'][$qst_time] ;
				// quickestArr price and time get end 

				$request->session()->put('tripDurations',$quickestArr);
				$request->session()->put('minPrice', $cheapestArr);	
				$request->session()->put('maxPrice', $response_data->filters->maxPrice);
				$request->session()->put('tripKey',$countingTrip);
				$request->session()->put('dataoftrip', $dataoftrip);			
				$request->session()->put('data_filters', $response_data->filters);
				$request->session()->put('air_lines', $response_data->airlines);
				$request->session()->put('allianceResult', $allianceResult);
				$request->session()->put('recommendedArr',$recommendedArr);
				
				
				$dataoftrip1['data']=$dataoftrip; 
				$dataoftrip1['allianceResult'] = $allianceResult ;
				$dataoftrip1['tripDurations'] = $request->session()->get('tripDurations') ;
				$dataoftrip1['minPrice'] =$request->session()->get('minPrice') ; 
				$dataoftrip1['maxPrice'] = $request->session()->get('maxPrice');
				$dataoftrip1['recommendedArr'] = $request->session()->get('recommendedArr');
				// print_r($dataoftrip1['recommendedArr']); exit ;   
				$dataoftrip1['data_filter']=$response_data->filters;
				$dataoftrip1['airlines']=$response_data->airlines;

				$request->session()->put('response', $dataoftrip1);	
				$request->session()->save();	

			}else {
				$request->session()->flush();
				$message = 'There are no flights for these date. For support please email us at info@flightapi.io.'; 
				if(!empty($response_data->message) && isset($response_data->message)){
					$message = $response_data->message ; 
				}
				$response = '<div class="m-5" style="text-align: center;"> <span  style="display:block">'.$message.'</span> </div>'; 
				return  $response ;
			}
		}else {	

			$dataoftrip1['tripDurations'] =$request->session()->get('tripDurations') ;
			$dataoftrip1['minPrice'] = $request->session()->get('minPrice'); 
			$dataoftrip1['maxPrice'] = $request->session()->get('maxPrice');
			$dataoftrip1['recommendedArr'] = $request->session()->get('recommendedArr'); 
			$countingTrip = $request->session()->get('tripKey'); 		
			$dataoftrip1['data'] = $request->session()->get('dataoftrip');
			$dataoftrip1['data_filter'] = $request->session()->get('data_filters');
			$dataoftrip1['airlines'] = $request->session()->get('air_lines');
			$dataoftrip1['allianceResult'] = $request->session()->get('allianceResult');
		}	 
		return  view('flightslist',compact('request','dataoftrip1','countingTrip','Currency')); 
    }
    // create function for onload to get round trip searched flight list end

   	//create function for onload to get first one way trip page display start
    public function searchOneWayFlightsPage(Request $request){		
		$request = $request; 
		$Currency = $request->Currency ; 
		return view('search-one-way-flights',compact('request','Currency'));
	}
	//create function for onload to get first one way trip page display end

	// create function for onload to get one way trip searched flight list start
    public function searchFlightsOneWayDetails(Request $request)
    {   
		// 
		$user_locastion= $this->ip_info($this->get_client_ip(), "Location");
		$Currency = 'USD' ;  
		if(!empty($user_locastion)){
			if($user_locastion['continent']=="Europe"){
			 $Currency = 'EUR';    
			}elseif($user_locastion['continent']=="North America"){
				$Currency = 'USD';  
			}elseif($user_locastion['country']=="Australia"){
				$Currency = 'AUD';  
			}elseif($user_locastion['country']=="United Arab Emirates"){
				$Currency = 'AED';  
			}                 
		}
		if(isset($request->Currency)){
			$Currency = $request->Currency ; 
		}
		if($request->datetimes == null){
			$request->datetimes = date('Y-m-d', strtotime(' +1 day')).' - '.date('Y-m-d', strtotime(' +1 day')); 
		}
		$datetimes = explode(' - ',$request->datetimes);
		// 
		if(isset($datetimes[0])){
			if(date('d/m/Y') == $datetimes[0] ){
				
				$datetimes = date('Y-m-d', strtotime(' +1 day'));
			}else{
				$datetimes =date_format(date_create($datetimes[0]),"Y-m-d");
			}
		}
		
		$departure_airport_code = $request->wherefrom_shortname;
		$arrival_airport_code = $request->whereto_shortname;
        $departure_date = $datetimes;
		$number_of_adults = $request->adults; 
		$number_of_childrens = $request->children; 
		$number_of_infants = $request->infants; 
		$cabin_class= $request->cabin_class;		
		$session_departure_airport_code = $request->session()->get('departure_airport_code') ; 
		$session_arrival_airport_code =$request->session()->get('arrival_airport_code');
		if($request->session()->get('trip_type') != 'one_way_trip'){
			$request->session()->flush();
		}
		if($session_departure_airport_code != $departure_airport_code || $session_arrival_airport_code != $arrival_airport_code || $departure_date != $request->session()->get('departure_date') 
		|| $number_of_adults != $request->session()->get('number_of_adults') || $number_of_childrens != $request->session()->get('number_of_childrens')
		|| $number_of_infants != $request->session()->get('number_of_infants') || $cabin_class != $request->session()->get('cabin_class')
		|| $Currency != $request->session()->get('Currency') 
		){
			$request->session()->put('Currency', $Currency);
			$request->session()->put('trip_type','one_way_trip');
			$request->session()->put('departure_airport_code',$departure_airport_code);
			$request->session()->put('arrival_airport_code',$arrival_airport_code);

			$request->session()->put('departure_date',$departure_date);
			$request->session()->put('number_of_adults',$number_of_adults);
			$request->session()->put('number_of_childrens',$number_of_childrens);
			$request->session()->put('number_of_infants',$number_of_infants);
			$request->session()->put('cabin_class',$cabin_class);
			$request->session()->save();
			// curl api call for get flight details start 
			$curl_handle = curl_init();
			$url = "https://api.flightapi.io/onewaytrip/6565b4e4f019853bf9d05ec3/".$departure_airport_code."/".$arrival_airport_code."/".$departure_date."/".$number_of_adults."/".$number_of_childrens."/".$number_of_infants."/".$cabin_class."/".$Currency."/?offset=0&limit=20";
			// Set the curl URL option
			curl_setopt($curl_handle, CURLOPT_URL, $url);
			// This option will return data as a string instead of direct output
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
			// Execute curl & store data in a variable
			$curl_data = curl_exec($curl_handle);
			curl_close($curl_handle);

			$dataoftrip = [];		
			$cheapestArr = [] ; 
			$quickestArr = [] ; 
			$recommendedArr = [] ;
			// Decode JSON into PHP array
			$response_data1 = json_decode($curl_data) ; 
			if(!empty($response_data1->trips)){
			$sizrof_response_data1=sizeof($response_data1->trips);
			}

			$curl_handle = curl_init();
			$url = "https://api.flightapi.io/onewaytrip/6565b4e4f019853bf9d05ec3/".$departure_airport_code."/".$arrival_airport_code."/".$departure_date."/".$number_of_adults."/".$number_of_childrens."/".$number_of_infants."/".$cabin_class."/".$Currency;
			// Set the curl URL option
			curl_setopt($curl_handle, CURLOPT_URL, $url);
			// This option will return data as a string instead of direct output
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
			// Execute curl & store data in a variable
			$curl_data = curl_exec($curl_handle);
			curl_close($curl_handle); 
				$response_data2 = json_decode($curl_data);	

				$response_data=$response_data1;

				if(!empty($response_data1->trips)){
				$sizrof_response_data2=sizeof($response_data2->trips);
				if($sizrof_response_data2 >	$sizrof_response_data1){
					$response_data=$response_data2; 
				}else{
				$response_data=$response_data1;
				}
				}
			// curl api call for get flight details end 
        		
		if(!empty($response_data) && !empty($response_data->trips)){
		    $faresdata=(array)$response_data->fares;
			$airlines=(array)$response_data->airlines;
			$airports=(array)$response_data->airports;
			$legsdata=(array)$response_data->legs;	
			$discount = DB::table('ecommerce_setting')->first();
			$discountPre = 0 ; 
			if(!empty($discount)){
				if($cabin_class == 'Economy' || $cabin_class == 'Premium_Economy'){
					$discountPre = $discount->discount ;
				}else{
					$discountPre = $discount->discount_for_business_and_first_class ;
				}
			}		
    	    foreach($response_data->trips as $tripKey=>$tripdata){
				
    	        $filter=$tripdata->id;
    	        $fare_data = array_filter($faresdata, function($var) use ($filter){
                    return ($var->tripId == $filter);
				});
				$fare_key =  array_key_first($fare_data) ; 
				$originalAmountDiscountPrice = ($fare_data[$fare_key]->price->originalAmount*$discountPre)/100 ; 
				$originalAmount =  round($fare_data[$fare_key]->price->originalAmount - $originalAmountDiscountPrice,2) ;
				$withoutDiscountPrice = round($fare_data[$fare_key]->price->originalAmount,2); 
    	        // first flight  details
                $filter=$tripdata->legIds[0];
                $first_flight_data = array_filter($legsdata, function($var) use ($filter){
                    return ($var->id == $filter);
				});

                $key_data_first=array_key_first($first_flight_data);
	             $filter=$first_flight_data[$key_data_first]->airlineCodes['0'];
	             $first_flight_name = array_filter($airlines, function($var) use ($filter){
	                 return ($var->code == $filter);
				 });
				 
				 $segments=$first_flight_data[$key_data_first]->segments;
                 
                 foreach($segments as  $key=>$segments_data){
                    $departureAirportCode=$segments_data->departureAirportCode;
                    $departureAirport_name_array = array_filter($airports, function($var) use ($departureAirportCode){
	                    return ($var->code == $departureAirportCode);
	                });
	                
                    $key_departureAirportCode=array_key_first($departureAirport_name_array);
                    $first_flight_data[$key_data_first]->segments[$key]->departureAirport_name=$departureAirport_name_array[$key_departureAirportCode]->name;
                   
                    
                    
                    
                    $arrivalAirportCode=$segments_data->arrivalAirportCode;
                  $arrivalAirportCode_name_array= array_filter($airports, function($var) use ($arrivalAirportCode){
	                    return ($var->code == $arrivalAirportCode);
	                });
	                
	                 $key_arrivalAirportCode_name_array=array_key_first($arrivalAirportCode_name_array);
                    $first_flight_data[$key_data_first]->segments[$key]->arrivalAirportCode_name=$arrivalAirportCode_name_array[$key_arrivalAirportCode_name_array]->name;
                    
                 }
				
				
				$formdate = date_create($first_flight_data[$key_data_first]->departureDateTime); 
				$todate = date_create($first_flight_data[$key_data_first]->arrivalDateTime) ; 
				$first_flight = []; 
				if(isset($first_flight_data[$key_data_first]->allianceCodes[0])){
					$allianceCodes[] = 	$first_flight_data[$key_data_first]->allianceCodes[0];
					$first_flight['allianceCodes'] = $first_flight_data[$key_data_first]->allianceCodes[0]; 
				}				
				$first_flight['fromDate'] = date_format($formdate,"D M d");
				$first_flight['toDate'] = date_format($todate,"D M d");
				$first_flight['fromtime'] = date_format($formdate," g:ia");
				$first_flight['totime'] = date_format($todate,"g:ia");
				$first_flight['stopoverCode'] =$first_flight_data[$key_data_first]->stopoverCode; 
				$first_flight['duration'] = $first_flight_data[$key_data_first]->duration ; 
				$first_flight['segments']= $first_flight_data[$key_data_first]->segments;
				$first_flight['stopoverDuration'] = $first_flight_data[$key_data_first]->stopoverDuration ; 
				 
				// first flight name and code 
				$key_flight=array_key_first($first_flight_name);
	             $flight_name=$first_flight_name[$key_flight]->name;
				 $flight_code=$first_flight_name[$key_flight]->code;
				 
				 $originalAmountDiscountPrice = ($response_data->filters->minPrice->originalAmount*$discountPre)/100 ; 

	             if(round($response_data->filters->minPrice->originalAmount - $originalAmountDiscountPrice,2) == $originalAmount){
					$cheapestArr['amount'] = $Currency.' '.$originalAmount; 
					$getTime  = explode(' ',$first_flight_data[$key_data_first]->duration); 
					$hoursfirst = (int)str_replace('h','',$getTime[0]);
					$minutesfirst = 0 ; 
					if(count($getTime) == 2){
						$minutesfirst = (int)str_replace('m','',$getTime[1]);
					}
					$totalhour = $hoursfirst ;
					$totalminutes = $minutesfirst; 
					
					$cheapestArr['time'] = round($totalhour)."h ".round($totalminutes)."m" ; 
				 }

				$getTime  = explode(' ',$first_flight_data[$key_data_first]->duration); 
				$hours = (int)str_replace('h','',$getTime[0]);
				$minutes = 0 ; 
				if(count($getTime) == 2){
					$minutes = (int)str_replace('m','',$getTime[1]);
				}
				$onehourcount =  $minutes*(1/60) ; 
				$firstTimesum  = $hours + $onehourcount ;
				
				 $totalhour = $hours ; 
				 $totalminutes = $onehourcount ; 
				 $quickestArr['time'][] = $firstTimesum ; 
				 $quickestArr['quickesttime'][$firstTimesum] = round($totalhour).'h '.round($totalminutes).'m ';  
				 $quickestArr['amount'][$firstTimesum] = $Currency.' '.$originalAmount ;

				// recommendedArr amount and time get start
				if($tripKey == 0){					
					$getTime  = explode(' ',$first_flight_data[$key_data_first]->duration); 
					$hours = (int)str_replace('h','',$getTime[0]);
					$minutes = 0 ; 
					if(count($getTime) == 2){
						$minutes = (int)str_replace('m','',$getTime[1]);
					}
					$onehourcount =  $minutes*(1/60) ; 
					$totalhour = $hours ; 
					$totalminutes = $onehourcount ; 

					$recommendedArr['time'] = round($totalhour).'h '.round($totalminutes).'m ';
					$recommendedArr['amount']= $Currency.' '.$originalAmount ;					
				}
				// recommendedArr amount and time get end

				 $dataoftrip[]=array('fare_original_amount'=>$originalAmount,'withoutDiscountPrice'=>$withoutDiscountPrice,'first_flight_data'=>$first_flight,'first_flight_name'=>$flight_name,'first_flight_code'=>$flight_code);
				 $tripKey = $tripKey+1 ; 
				}				
				$nullArray = [] ; 
				$allianceResult = array_merge($nullArray ,array_unique($allianceCodes)) ;

				$countingTrip = $tripKey ;
				$qst_time= min($quickestArr['time']) ;

				$quickestArr['time'] = $quickestArr['quickesttime'][$qst_time] ; 
				$quickestArr['amount'] = $quickestArr['amount'][$qst_time] ; 
				$request->session()->put('tripDurations',$quickestArr);
				$request->session()->put('minPrice', $cheapestArr);	
				$request->session()->put('maxPrice', $response_data->filters->maxPrice);
				$request->session()->put('recommendedArr',$recommendedArr);	

				$request->session()->put('allianceResult',$allianceResult);
				$request->session()->put('tripKey',$countingTrip);
				$request->session()->put('dataoftrip', $dataoftrip);			
				$request->session()->put('data_filters', $response_data->filters);
				$request->session()->put('air_lines', $response_data->airlines);
				$dataoftrip1['data']=$dataoftrip;
				$dataoftrip1['allianceResult']=$allianceResult;
				$dataoftrip1['tripDurations'] = $request->session()->get('tripDurations') ;
				$dataoftrip1['minPrice'] =$request->session()->get('minPrice') ; 
				$dataoftrip1['maxPrice'] = $request->session()->get('maxPrice'); 
				$dataoftrip1['recommendedArr']=$request->session()->get('recommendedArr');
				$dataoftrip1['data_filter']=$response_data->filters;
				$dataoftrip1['airlines']=$response_data->airlines;
				$request->session()->put('response', $dataoftrip1);		
				$request->session()->save();
				
			}else {  
				$request->session()->flush();
				$message = 'There are no flights for these date. For support please email us at info@flightapi.io.'; 
				if(!empty($response_data->message) && isset($response_data->message)){
					$message = $response_data->message ; 
				}
				$response = '<div class="m-5" style="text-align: center;"> <span  style="display:block">'.$message.'</span> </div>'; 
				return  $response ; 
			}
		}else {
			$countingTrip = $request->session()->get('tripKey'); 
			$dataoftrip1['allianceResult']=$request->session()->get('allianceResult');
			$dataoftrip1['data'] = $request->session()->get('dataoftrip');
			$dataoftrip1['recommendedArr']=$request->session()->get('recommendedArr');
			$dataoftrip1['data_filter'] = $request->session()->get('data_filters');
			$dataoftrip1['airlines'] = $request->session()->get('air_lines');
			$dataoftrip1['tripDurations'] = $request->session()->get('tripDurations') ;
			$dataoftrip1['minPrice'] =$request->session()->get('minPrice') ; 
			$dataoftrip1['maxPrice'] = $request->session()->get('maxPrice'); 
		}	 
		return  view('onewayflightslist',compact('request','dataoftrip1','countingTrip','Currency')); 
    }
	// create function for onload to get one way trip searched flight list end
	
	//create function for onload to get Multiple way trip page display start
	public function searchMultipleWayFlightsPage(Request $request){ 
		$request = $request; 
		$Currency = $request->Currency ; 
		return view('search-multiple-way-flights',compact('request','Currency'));
	}
	//create function for onload to get Multiple way trip page display end

	// create function for onload to get Multiple way trip searched flight list start
	public function searchFlightsMultipleWayDetails(Request $request){
		$request= json_decode(str_replace("}1","}",$request->data)) ; 
		
		$user_locastion= $this->ip_info($this->get_client_ip(), "Location");
			$Currency = 'USD' ;  
            if(!empty($user_locastion)){
                if($user_locastion['continent']=="Europe"){
                 $Currency = 'EUR';    
                }elseif($user_locastion['continent']=="North America"){
                    $Currency = 'USD';  
                }elseif($user_locastion['country']=="Australia"){
                    $Currency = 'AUD';  
                }elseif($user_locastion['country']=="United Arab Emirates"){
                    $Currency = 'AED';  
                }                 
            }
		if(isset($request->Currency)){
			$Currency = $request->Currency ; 
		}
		$numberofFlights = $request->numberofFlights ; 
		$apiparameter = '' ; 
		$departure_airport_code = [] ;
		$arrival_airport_code = [] ;
		$departure_date_time = [] ;  
		$cheapestArr = [] ; 
		$quickestArr = [] ;
		$recommendedArr = [] ;   
		for($i=0;$i < $numberofFlights; $i++){
			if($i == 0){
				$increment = $i+1 ; 
				$dataIncrement =$increment+2;
				$datetimes = 'datetimes'.$dataIncrement ;
				$datetimes = explode(' - ',$request->$datetimes);
				if(isset($datetimes[0])){
					if(date('d/m/Y') == $datetimes[0] ){
						
						$datetimes = date('Y-m-d', strtotime(' +1 day'));
					}else{
						$datetimes =date_format(date_create($datetimes[0]),"Y-m-d");
					}
				}
				$departure_date = $datetimes;				 
				$apiparameter .= 'dep'.$increment.'='.$request->multiwherefrom_shortname.'&'; 
				$apiparameter .= 'arr'.$increment.'='.$request->multiwhereto_shortname.'&'; 
				$apiparameter .= 'date'.$increment.'='.$departure_date.'&';
				$departure_airport_code[] = $request->multiwherefrom_shortname ; 
				$arrival_airport_code[] = $request->multiwhereto_shortname ;
				$departure_date_time[] = $departure_date ; 
			}else {
				$increment = $i+1 ; 
				$dataIncrement =$increment+2; 
				$datetimes = 'datetimes'.$dataIncrement ;
				$datetimes = explode(' - ',$request->$datetimes);
				if(isset($datetimes[0])){
					if(date('d/m/Y') == $datetimes[0] ){						
						$datetimes = date('Y-m-d', strtotime(' +1 day'));
					}else{
						$datetimes = date_format(date_create($datetimes[0]),"Y-m-d");
					}
				}
				$departure_date = $datetimes;	
				$multiwherefrom_shortname = 'multiwherefrom'.$i.'_shortname';
				$multiwhereto_shortname = 'multiwhereto'.$i.'_shortname';
				$apiparameter .= '&dep'.$increment.'='.$request->$multiwherefrom_shortname.'&'; 
				$apiparameter .= 'arr'.$increment.'='.$request->$multiwhereto_shortname.'&'; 
				$apiparameter .= 'date'.$increment.'='.$departure_date.'&';
				$departure_airport_code[] = $request->$multiwherefrom_shortname ; 
				$arrival_airport_code[] = $request->$multiwhereto_shortname ;
				$departure_date_time[] = $departure_date ; 
			}
		} 
		Session::flush(); 
		if(Session::get('trip_type') != 'multiple_trip'){
			Session::flush(); 			
		}

		$numberofFlights = $request->numberofFlights ; 
		$number_of_adults = $request->adults; 
		
		$number_of_childrens = $request->children; 
		$number_of_infants = $request->infants; 
		$cabin_class= $request->cabin_class;

		$session_departure_airport_code = Session::get('departure_airport_code'); 
		$session_arrival_airport_code =  Session::get('arrival_airport_code') ;
		
		if($session_arrival_airport_code != implode(",",$arrival_airport_code) || $session_departure_airport_code != implode(",",$departure_airport_code) || implode(",",$departure_date_time) != Session::get('departure_date')
		|| $number_of_adults != Session::get('number_of_adults') || $number_of_childrens != Session::get('number_of_childrens')
		|| $number_of_infants != Session::get('number_of_infants') || $cabin_class != Session::get('cabin_class') || $Currency != Session::get('Currency')
		){
			Session::put('Currency',$Currency);
			Session::put('departure_airport_code',implode(",",$departure_airport_code));
			Session::put('arrival_airport_code',implode(",",$arrival_airport_code));
			Session::put('departure_date',implode(",",$departure_date_time));
			Session::put('trip_type','multiple_trip');
			Session::put('number_of_adults',$number_of_adults);
			Session::put('number_of_childrens',$number_of_childrens);
			Session::put('number_of_infants',$number_of_infants);
			Session::put('cabin_class',$cabin_class);
			Session::save();
		

		// curl api call for get flight details start 
		$curl_handle = curl_init();
		$url = "https://api.flightapi.io/multicity/6565b4e4f019853bf9d05ec3/".$numberofFlights."/".$number_of_adults."/".$number_of_childrens."/".$number_of_infants."/".$cabin_class."/".$Currency."?".$apiparameter."/?offset=0&limit=20";
 		// Set the curl URL option
		curl_setopt($curl_handle, CURLOPT_URL, $url);
		// This option will return data as a string instead of direct output
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
		// Execute curl & store data in a variable
		$curl_data = curl_exec($curl_handle);
		curl_close($curl_handle);

		$dataoftrip = [];	
		$first_flight = []; 
		$allianceCodes = [] ;
		// Decode JSON into PHP array
		$response_data1 = json_decode($curl_data) ; 
		if(!empty($response_data1->trips)){
		$sizrof_response_data1=sizeof($response_data1->trips);		
		}

		$curl_handle = curl_init();
		$url = "https://api.flightapi.io/multicity/6565b4e4f019853bf9d05ec3/".$numberofFlights."/".$number_of_adults."/".$number_of_childrens."/".$number_of_infants."/".$cabin_class."/".$Currency."?".$apiparameter;
		// Set the curl URL option
		curl_setopt($curl_handle, CURLOPT_URL, $url);
		// This option will return data as a string instead of direct output
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
		// Execute curl & store data in a variable
		$curl_data = curl_exec($curl_handle);
		curl_close($curl_handle); 
			$response_data2 = json_decode($curl_data);

			$response_data=$response_data1;
			if(!empty($response_data1->trips)){
			$sizrof_response_data2=sizeof($response_data2->trips);
			if($sizrof_response_data2 >	$sizrof_response_data1){
			    $response_data=$response_data2; 
			}else{
			   $response_data=$response_data1;
			}
			}
		
		// curl api call for get flight details end 
				
		if(!empty($response_data) && !empty($response_data->trips)){
			$faresdata=(array)$response_data->fares;
			$airlines=(array)$response_data->airlines;
			$airports=(array)$response_data->airports;
			$legsdata=(array)$response_data->legs;
			
			$discount = DB::table('ecommerce_setting')->first();
			$discountPre = 0 ; 
			if(!empty($discount)){
				if($cabin_class == 'Economy' || $cabin_class == 'Premium_Economy'){
					$discountPre = $discount->discount ;
				}else{
					$discountPre = $discount->discount_for_business_and_first_class ;
				}
			}	

			foreach($response_data->trips as $tripKey=>$tripdata){
				
				$filter=$tripdata->id;
				$fare_data = array_filter($faresdata, function($var) use ($filter){
					return ($var->tripId == $filter);
				});
				$fare_key =  array_key_first($fare_data) ; 
				$originalAmountDiscountPrice = ($fare_data[$fare_key]->price->originalAmount*$discountPre)/100 ; 
				$originalAmount =  round($fare_data[$fare_key]->price->originalAmount - $originalAmountDiscountPrice,2) ;
				$withoutDiscountPrice = round($fare_data[$fare_key]->price->originalAmount,2);
				$durationnumber  = 0 ; 
				$totalhour = 0 ; 
				$totalminutes = 0 ; 
				$minutes = 0 ;
				// legIds wise  flight  details get 
				foreach($tripdata->legIds as $keyvalue=>$legIds){					 
					$filter=$legIds; 
					$first_flight_data = array_filter($legsdata, function($var) use ($filter){
						return ($var->id == $filter);
					});
					$key_data_first=array_key_first($first_flight_data);
					$filter=$first_flight_data[$key_data_first]->airlineCodes['0'];
					$first_flight_name = array_filter($airlines, function($var) use ($filter){
						return ($var->code == $filter);
					});

					if($totalhour == 0){
						$getTime  = explode(' ',$first_flight_data[$key_data_first]->duration); 
						$hours = (int)str_replace('h','',$getTime[0]);
						$totalhour =  $hours ;
					}
					if($totalminutes == 0){				 
					if(count($getTime) == 2){
						$minutes = (int)str_replace('m','',$getTime[1]);
					}
					$totalminutes = $minutes ;
					} 
					
					// echo '<pre>' ; print_r($firstTimesum) ;

					$formdate = date_create($first_flight_data[$key_data_first]->departureDateTime); 
					$todate = date_create($first_flight_data[$key_data_first]->arrivalDateTime) ; 
						
					//flight details key wise details store in array start  
					$first_flight[$keyvalue]['fromDate'] = date_format($formdate,"D M d");
					$first_flight[$keyvalue]['toDate'] = date_format($todate,"D M d");
					$first_flight[$keyvalue]['fromtime'] = date_format($formdate," g:ia");
					$first_flight[$keyvalue]['totime'] = date_format($todate,"g:ia");
					$first_flight[$keyvalue]['stopoverCode'] =$first_flight_data[$key_data_first]->stopoverCode; 
					$first_flight[$keyvalue]['duration'] = $first_flight_data[$key_data_first]->duration ;
					$first_flight[$keyvalue]['stopoverDuration'] = $first_flight_data[$key_data_first]->stopoverDuration ;  
					$first_flight[$keyvalue]['segments']= $first_flight_data[$key_data_first]->segments;
					$key_flight=array_key_first($first_flight_name);
					$first_flight[$keyvalue]['flight_name']=$first_flight_name[$key_flight]->name;
					$first_flight[$keyvalue]['flight_code']=$first_flight_name[$key_flight]->code;
					//flight details key wise details store in array end 

					$segments=$first_flight_data[$key_data_first]->segments;	
					// particuler Airport name and code push in array start 		
					foreach($segments as  $key=>$segments_data){
						$departureAirportCode=$segments_data->departureAirportCode;
						$departureAirport_name_array = array_filter($airports, function($var) use ($departureAirportCode){
							return ($var->code == $departureAirportCode);
						});
						
						$key_departureAirportCode=array_key_first($departureAirport_name_array);
						$first_flight_data[$key_data_first]->segments[$key]->departureAirport_name=$departureAirport_name_array[$key_departureAirportCode]->name;
					
						$arrivalAirportCode=$segments_data->arrivalAirportCode;
						$arrivalAirportCode_name_array= array_filter($airports, function($var) use ($arrivalAirportCode){
							return ($var->code == $arrivalAirportCode);
						});
						
						$key_arrivalAirportCode_name_array=array_key_first($arrivalAirportCode_name_array);
						$first_flight_data[$key_data_first]->segments[$key]->arrivalAirportCode_name=$arrivalAirportCode_name_array[$key_arrivalAirportCode_name_array]->name;
						
					}
					// particuler Airport name and code push in array end
									
				} 
               	$durationnumber  =($totalhour * 60) + $totalminutes; 
				// legIds wise  flight  details get end
				$filter=$tripdata->legIds[0];
                $first_flight_data = array_filter($legsdata, function($var) use ($filter){
                    return ($var->id == $filter);
				});              
                $key_data_first=array_key_first($first_flight_data);
				if(isset($first_flight_data[$key_data_first]->allianceCodes[0])){
					$allianceCodes[] = 	$first_flight_data[$key_data_first]->allianceCodes[0];
					$allianceCodesResult = $first_flight_data[$key_data_first]->allianceCodes[0]; 
				}	
				 
				$quickestArr['time'][] =  $durationnumber ;
				$quickestArr['totalhour'][$durationnumber] = $totalhour ;
				$quickestArr['onehourcount'][$durationnumber] =  $totalminutes ;  
				$quickestArr['amount'][$durationnumber] =  $Currency.' '.$originalAmount ;

				$cheapestArr['cheapestAmount'][] = $originalAmount; 
				$cheapestArr['amount'][$originalAmount] =  $Currency.' '.$originalAmount ;
				$cheapestArr['totalhour'][$originalAmount] = $totalhour ;
				$cheapestArr['onehourcount'][$originalAmount] = $totalminutes ;  

				// recommendedArr amount and time get start
				if($tripKey == 0){	
					$recommendedArr['time'] = round($totalhour).'h '.round($totalminutes).'m ';
					$recommendedArr['amount'] = $Currency.' '.$originalAmount ;					
				}
				// recommendedArr amount and time get end

				$dataoftrip[]=array('allianceCodesResult'=>$allianceCodesResult,'durationnumber'=>$durationnumber,'fare_original_amount'=>$originalAmount,'withoutDiscountPrice'=>$withoutDiscountPrice,'flight_details'=>$first_flight);
				$tripKey = $tripKey + 1 ; 	
			}  
			$nullArray = [] ; 
			$allianceResult = array_merge($nullArray ,array_unique($allianceCodes)) ;
			// quickest  filter code to get time and amount 
			$filterquickest = min($quickestArr['time']); 
			$quickestArr['amount'] = $quickestArr['amount'][$filterquickest] ; 			
			$quickestArr['time'] = round($quickestArr['totalhour'][$filterquickest])."h ".round($quickestArr['onehourcount'][$filterquickest])."m"; 

			// cheapest filter code to get time and amount  
			$filtercheapest = min($cheapestArr['cheapestAmount']); 			
			$cheapestArr['time'] = round($cheapestArr['totalhour'][$filtercheapest])."h ".round($cheapestArr['onehourcount'][$filtercheapest])."m"; 
			$cheapestArr['amount'] = $cheapestArr['amount'][$filtercheapest] ; 

				$countingTrip = $tripKey ;
				// data  passed in blade file in array formate 
				$dataoftrip1['data']=$dataoftrip;
				$dataoftrip1['data_filter']=$response_data->filters;
				$dataoftrip1['allianceResult'] = $allianceResult ; 
				$dataoftrip1['airlines']=$response_data->airlines;
				$dataoftrip1['tripDurations'] = $quickestArr ;
				$dataoftrip1['recommendedArr'] =$recommendedArr ; 
				$dataoftrip1['tripDurations'] = $quickestArr ;
				$dataoftrip1['maxPrice'] = $response_data->filters->maxPrice;
				$dataoftrip1['minPrice'] =$cheapestArr ; 

				// data store in session 
				Session::put('tripDurations',$quickestArr);
				Session::put('recommendedArr',$recommendedArr);
				Session::put('minPrice', $cheapestArr);	
				Session::put('maxPrice', $response_data->filters->maxPrice);
				Session::put('tripKey',$countingTrip);
				Session::put('dataoftrip',$dataoftrip);
				Session::put('data_filters',$response_data->filters);
				Session::put('air_lines',$response_data->airlines);
				Session::put('allianceResult',$allianceResult);
				Session::put('response',$dataoftrip1);		
				Session::save();
				
			}else {
				// return passed error 
				Session::flush();
				$message = 'There are no flights for these date. For support please email us at info@flightapi.io.'; 
				if(!empty($response_data->message) && isset($response_data->message)){
					$message = $response_data->message ; 
				}
				$response = '<div class="m-5" style="text-align: center;"> <span  style="display:block">'.$message.'</span> </div>'; 
				return  $response ; 
			}
		}else {
			// return passed stored session data 
			$countingTrip = Session::get('tripKey'); 
			$dataoftrip1['data'] = Session::get('dataoftrip');
			$dataoftrip1['allianceResult'] = Session::get('allianceResult'); 
			$dataoftrip1['data_filter'] = Session::get('data_filters');
			$dataoftrip1['airlines'] =Session::get('air_lines');
			$dataoftrip1['tripDurations'] = Session::get('tripDurations') ;
			$dataoftrip1['minPrice'] =Session::get('minPrice') ; 
			$dataoftrip1['maxPrice'] = Session::get('maxPrice');
			$dataoftrip1['recommendedArr'] = Session::get('recommendedArr');  
		}	 
		return  view('multiplewayflightslist',compact('request','dataoftrip1','countingTrip','Currency')); 
	}
	// create function for onload to get Multiple way trip searched flight list start
	
	public function currencies(){
		$curl_handle = curl_init();
		$url = "https://n.alternativeairlines.com/api/currencies";
		// Set the curl URL option
		curl_setopt($curl_handle, CURLOPT_URL, $url);
		// This option will return data as a string instead of direct output
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
		// Execute curl & store data in a variable
		$curl_data = curl_exec($curl_handle);
		curl_close($curl_handle);	
		// Decode JSON into PHP array
		$response_data = json_decode($curl_data);
		return view('currenciess',compact('response_data')); 
	}

	public function searchFlight($value){
		$curl_handle = curl_init();
		$url = "https://www.alternativeairlines.com/booking/airport-search?q=".$value;
		// Set the curl URL option
		curl_setopt($curl_handle, CURLOPT_URL, $url);
		// This option will return data as a string instead of direct output
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
		// Execute curl & store data in a variable
		$curl_data = curl_exec($curl_handle);
		curl_close($curl_handle);	
		// Decode JSON into PHP array
		$response_data = $curl_data;
	 	return $response_data ; 
	}
	
}
?>