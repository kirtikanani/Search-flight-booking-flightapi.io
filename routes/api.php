<?php



use Illuminate\Http\Request;



/*

|--------------------------------------------------------------------------

| API Routes

|--------------------------------------------------------------------------

|

| Here is where you can register API routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| is assigned the "api" middleware group. Enjoy building your API!

|

*/



// Route::middleware('auth:api')->get('/user', function (Request $request) {

//     return $request->user();

// });

Route::group(['namespace' => 'Api'], function() {

Route::get('/driver_register', function (Request $request) {

    return 'test';

});

Route::get('/driver_login', function (Request $request) {

    return 'test';

});

Route::get('/driver_update', function (Request $request) {

    return 'test';

});

Route::get('/pickup_locastion_update', function (Request $request) {

    return 'test';

});



Route::get('/drop_locastion_update', function (Request $request) {

    return 'test';

});



Route::get('/driver_history_data', function (Request $request) {

    return 'test';

});





Route::get('/update_customer_card_info', function (Request $request) {

    return 'test';

});



Route::get('/get_customer_card_info', function (Request $request) {

    return 'test';

});






Route::get('/get_product','CustomerController@get_product');

Route::get('/add_to_cart','CustomerController@add_to_cart');

Route::post('/place_order','CustomerController@place_order');

Route::get('/single_product/{id}','CustomerController@single_product');

Route::get('/get_order','CustomerController@get_order');

Route::get('/get_product_by_category/{id}','CustomerController@get_product_by_category');


Route::post('/driver_update','DriverController@update');

Route::post('/driver_register','DriverController@store');

Route::post('/driver_login','DriverController@login');

Route::post('/genrate_driver_otp','DriverController@genrate_driver_otp');

Route::post('/pickup_locastion_update','DriverController@pickup_locastion_update');

Route::post('/drop_locastion_update','DriverController@drop_locastion_update');

Route::post('/driver_history_data','DriverController@driver_history_data');

Route::post('/trip_detail','DriverController@trip_detail');

Route::post('/driver_home','DriverController@driver_home');

Route::post('/driver_contact','DriverController@driver_contact');

Route::post('/driver_forgot_pass','DriverController@driver_forgot_pass');

Route::post('/get_driver_profile','DriverController@get_driver_profile');

Route::post('/update_driver_license','DriverController@update_driver_license');

Route::post('/update_driver_document','DriverController@update_driver_document');

Route::post('/driver_active_ture','DriverController@driver_active_ture');

Route::post('/driver_upcomming_ture','DriverController@driver_upcomming_ture');

Route::post('/driver_upcomming_ture_new','DriverController@driver_upcomming_ture_new');

Route::post('/stop_details','DriverController@stop_details');

Route::post('/start_stops','DriverController@start_stops');

Route::post('/end_stops','DriverController@end_stops');

Route::post('/driver_update_vehicle','DriverController@driver_update_vehicle');

Route::post('/driver_update_lat_long','DriverController@driver_update_lat_long');

Route::post('/driver_bankdetails','DriverController@driver_bankdetails');

Route::post('/get_driver_bankdetails','DriverController@get_driver_bankdetails');

Route::post('/add_qualifiction_data','DriverController@add_qualifiction_data');

Route::post('/get_qualifiction_data','DriverController@get_qualifiction_data');

Route::post('/delete_qualifiction_data','DriverController@delete_qualifiction_data');

Route::post('/add_driver_company_info','DriverController@add_driver_company_info');

Route::post('/get_driver_company_info','DriverController@get_driver_company_info');

Route::post('/add_driver_passportdetails','DriverController@add_driver_passportdetails');

Route::post('/get_driver_passportdetails','DriverController@get_driver_passportdetails');

Route::post('/delete_driver_passportdetails','DriverController@delete_driver_passportdetails');

Route::post('/instruction_videos_list','DriverController@instruction_videos_list');



Route::post('/add_criminal_record','DriverController@add_criminal_record');

Route::post('/get_criminal_record','DriverController@get_criminal_record');

Route::post('/delete_criminal_record','DriverController@delete_criminal_record');



Route::post('/driver_route_detail','DriverController@driver_route_detail');



Route::post('/start_loading_time','DriverController@start_loading_time');

Route::post('/stop_loading_time','DriverController@stop_loading_time');



//Route::post('/update_collect_status','DriverController@update_collect_status');

//Route::post('/update_delivery_status','DriverController@update_delivery_status');

Route::post('/start_unloading_time','DriverController@start_unloading_time');

Route::post('/end_unloading_time','DriverController@end_unloading_time');



Route::post('/start_tour','DriverController@start_tour');

Route::post('/end_tour','DriverController@end_tour');

Route::post('/scan_pickup_status','DriverController@scan_pickup_status');

Route::post('/scan_deliver_status','DriverController@scan_deliver_status');

Route::post('/deliver_duty_status','DriverController@driver_duty_status');

Route::post('/driver_complated_stop','DriverController@driver_complated_stop');

Route::post('/driver_all_stop','DriverController@driver_all_stop');



Route::post('/update_stop_image','DriverController@update_stop_image');

Route::post('/delete_stop_image','DriverController@delete_stop_image');

Route::post('/update_stop_signature','DriverController@update_stop_signature');

Route::post('/cancel_trip','DriverController@cancel_trip');

Route::post('/receipt_trip','DriverController@receipt_trip');



Route::post('/local_address_driver_add','DriverController@local_address_driver_add');

Route::post('/local_address_driver','DriverController@local_address_driver');

Route::post('/driver_vehical_info','DriverController@driver_vehical_info');

Route::post('/delete_driver_vehical_info','DriverController@delete_driver_vehical_info');

Route::post('/get_driver_vehical_info','DriverController@get_driver_vehical_info');

Route::post('/driver_license_document','DriverController@driver_license_document');

Route::post('/delete_driver_license_document','DriverController@delete_driver_license_document');

Route::post('/get_driver_license_document','DriverController@get_driver_license_document');

Route::post('/get_driver_adr','DriverController@get_driver_adr');

Route::post('/adr_document','DriverController@adr_document');

Route::post('/food_approval_document','DriverController@food_approval_document');

Route::post('/get_driver_food_approval','DriverController@get_driver_food_approval');



Route::post('/get_chat_detail','DriverController@get_chat_detail');

Route::post('/send_chat_message','DriverController@send_chat_message');







Route::post('/customer_register','CustomerController@store');

Route::post('/customer_update','CustomerController@update');

Route::post('/genrate_customer_otp','CustomerController@genrate_customer_otp');

Route::post('/customer_login','CustomerController@login');

Route::post('/update_customer_card_info','CustomerController@update_customer_card_info');

Route::post('/get_customer_card_info','CustomerController@get_customer_card_info');



Route::post('/get_customer_profile_info','CustomerController@get_customer_profile_info');



Route::post('/update_customer_profile_info','CustomerController@update_customer_profile_info');



Route::post('/add_order_rating','CustomerController@add_order_rating');

Route::post('/get_order_rating','CustomerController@get_order_rating');



Route::post('/get_page','DriverController@get_page');







//Route::post('/customer_place_order','CustomerController@placeorder');

Route::post('/customer_update_payment','CustomerController@update_customer_payment');

Route::post('/customer_order','CustomerController@customer_order');

Route::post('/customer_new_order','CustomerController@customer_new_order');

Route::post('/get_customer_order','CustomerController@get_customer_order');

Route::post('/customer_history','CustomerController@customer_history');

Route::post('/active_ture','CustomerController@active_ture');



Route::post('/customer_contact','CustomerController@customer_contact');



Route::post('/history_route','CustomerController@history_route');

Route::post('/customer_forgot_pass','CustomerController@customer_forgot_pass');



Route::post('/upload_scan_lable','CustomerController@upload_scan_lable');













});

 