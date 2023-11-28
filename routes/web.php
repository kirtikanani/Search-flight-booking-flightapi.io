<?php

//use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagebookingController;
/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/



//Route::get('/', function () {

//    return view('welcome');

//});

Route::get('/', 'HomeController@index')->name('index');

//Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/booking_details', 'BookingController@booking_details')->name('booking_details');

Route::any('/insert_booking_details', 'BookingController@insert_booking_details')->name('insert_booking_details');
Route::get('insert_redirect_url', 'BookingController@insert_redirect_url')->name('insert_redirect_url');
Route::get('insert_cancel_url', 'BookingController@insert_cancel_url')->name('insert_cancel_url');
Route::get('paymnet_pages', 'BookingController@paymnet_pages_url')->name('paymnet_pages_url');

//credit debit cards
Route::get('/credit-debit-cards', 'CreditDebitCardCtroller@view')->name('credit-debit-cards');

// check charge details 
Route::post('check_charge', 'BookingController@checkCharge')->name('check_charge');


// bank-transfer
Route::get('bank-transfer/{id}', 'ManagebookingController@bankTransfer')->name('bank-transfer');

// uploade  bank-transfer payment proff 
Route::post('bank-transfer-payment-proff', 'BookingController@backPaymentProff')->name('bank-transfer-payment-proff');



//Flights Details url start 

// airport details search route start 
Route::get('/search-airport/{value}', 'FlightsDetailsController@searchFlight')->name('search-airport');
// airport details search route end 

// round  trip flights details url start  
Route::get('/search-flights', 'FlightsDetailsController@searchFlightsPage')->name('search-flights');
Route::get('/search-flights-details', 'FlightsDetailsController@searchFlightsDetails')->name('search-flights-details');
// round  trip flights details url end  

// one-way trip flights details url start  
Route::get('/search-flights-one-way', 'FlightsDetailsController@searchOneWayFlightsPage')->name('search-flights-one-way');
Route::get('/search-flights-one-way-details', 'FlightsDetailsController@searchFlightsOneWayDetails')->name('search-flights-one-way-details');

// one-way trip flights details url end  

// multiple-way trip flights details url start  
Route::get('/search-flights-multiple-way', 'FlightsDetailsController@searchMultipleWayFlightsPage')->name('search-flights-multiple-way');
Route::get('/search-flights-multiple-way-details', 'FlightsDetailsController@searchFlightsMultipleWayDetails')->name('search-flights-multiple-way-details');
// multiple-way trip flights details url end

//Flights Details url start 

// get country and currency code start 
Route::get('/currenciess', 'FlightsDetailsController@currencies')->name('currencies');
//get country and currency code start 

Route::get('/search-flights-details-test', 'FlightsDataTestController@searchFlightsDetailsTest')->name('search-flights-details-test');

Route::get('/index', 'HomeController@index')->name('index');

Route::get('/category/{id}', 'HomeController@category')->name('category');

Route::get('/products/{id}', 'HomeController@products')->name('products');

Route::get('/search', 'HomeController@search')->name('search');

Route::get('/cart', 'HomeController@cart')->name('cart');

Route::get('/wishlist', 'HomeController@wishlist')->name('wishlist');

Route::get('/add-to-cart/{id}', 'HomeController@addToCart')->name('add-to-cart');

Route::post('/single-add-to-cart', 'HomeController@singleAddToCart')->name('single-add-to-cart');

Route::post('/multi-add-to-cart', 'HomeController@multiAddToCart')->name('multi-add-to-cart');

Route::post('/add-to-wishlist', 'HomeController@AddToWishlist')->name('add-to-wishlist');

Route::patch('/update-cart', 'HomeController@update')->name('update-cart');

Route::delete('/remove-from-cart', 'HomeController@remove')->name('remove-from-cart');

Route::get('/clearcart', 'HomeController@clearcart')->name('clearcart');

Route::get('/clearwishlist', 'HomeController@clearwishlist')->name('clearwishlist');

Route::get('/checkout', 'HomeController@checkout')->name('checkout');

Route::get('/thankyou/{id}', 'HomeController@thankyou')->name('thankyou');

Route::get('/login', 'Auth\LoginController@index')->name('login');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::post('/place_order/{id}', 'HomeController@place_order')->name('place_order');

Route::get('/myaccount', 'HomeController@myaccount')->name('myaccount');
Route::get('/manage-booking', 'ManagebookingController@index')->name('manage_booking');
Route::get('/manage-booking-view', 'ManagebookingController@index')->name('manage_booking');

// Manage booking reference check route
Route::post('/booking-reference','ManagebookingController@bookingReferenceCheck')->name('booking_reference');



Route::post('/login_manual', 'HomeController@login_manual')->name('login_manual');


Route::post('/update_profile/{id}', 'HomeController@update_profile')->name('update_profile');

Route::get('/view_order/{id}', 'HomeController@view_order')->name('view_order');

Route::post('/get_currency', 'HomeController@get_currency')->name('get_currency');



Route::post('color_check', 'HomeController@color_check')->name('color_check');

Route::post('contact', 'HomeController@contact')->name('contact');



Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');



Route::get('driver', 'HomeController@driver_dashboard')->name('driver.home');



Route::get('driver/order', 'HomeController@driver_order')->name('driver.order');



Route::post('driver/add_order', 'HomeController@insert_order')->name('driver.insert_order');



Route::get('driver/profile', 'HomeController@driver_profile')->name('driver.driver_profile');



Route::post('driver/profile/{id}', 'HomeController@update_driver')->name('driver.update_driver');



Route::get('customer', 'HomeController@customer_dashboard')->name('customer.home');



Route::get('customer/profile', 'HomeController@customer_profile')->name('customer.customer_profile');



Route::post('customer/profile/{id}', 'HomeController@update_customer')->name('customer.update_customer');



Route::get('customer/order', 'HomeController@customer_order')->name('customer.order');



Route::post('customer/add_order', 'HomeController@insert_order')->name('customer.insert_order');



Route::get('pages/{id}', 'HomeController@all_page')->name('pages');



/*Route::post('logout', 'HomeController@logout')->name('driver.logout');*/



Route::get('changepassword', function() {

    $user = App\Http\Controllers\Admin::where('email', 'admin@gmail.com')->first();

    $user->password = Hash::make('admin@123');

    $user->save();

 

    echo 'Password changed successfully.';

});

Auth::routes();





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Route::get('razorpay', [HomeController::class, 'razorpay'])->name('razorpay');

//Route::post('razorpaypayment', [HomeController::class, 'payment'])->name('payment');



Route::get('razorpay', 'HomeController@razorpay')->name('razorpay');



Route::post('razorpaypayment', 'HomeController@payment')->name('payment');

Route::get('/place_order_razorpay/{id}', 'HomeController@place_order_razorpay')->name('place_order_razorpay');


