<?php



Route::group(['namespace' => 'Admin'], function() {



    Route::get('/', 'HomeController@index')->name('admin.dashboard');

    

    // Driver

    Route::get('manage_driver', 'DriverController@index')->name('admin.manage_driver');

    Route::get('add_driver', 'DriverController@create')->name('admin.add_driver');

    Route::post('add_driver', 'DriverController@store')->name('admin.insert_driver');

    Route::get('edit_driver/{id}', 'DriverController@edit')->name('admin.edit_driver');

    Route::post('edit_driver/{id}', 'DriverController@update')->name('admin.update_driver');

    Route::get('delete_driver/{id}', 'DriverController@destroy')->name('admin.delete_driver');

    Route::get('view_driver/{id}', 'DriverController@show')->name('admin.view_driver');

    Route::get('delete_video/{id}', 'HomeController@delete_video')->name('admin.delete_video');

    



    // Login

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');

    Route::post('login', 'Auth\LoginController@login');

    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');



    // Register

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');

    Route::post('register', 'Auth\RegisterController@register');



    // Passwords

    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');

    

    // Customer

   // Route::get('add_customer', 'CustomerController@create')->name('admin.add_customer');

//    Route::get('manage_customer', 'CustomerController@index')->name('admin.manage_customer');

//    Route::post('insert_customer', 'CustomerController@store')->name('admin.insert_customer');

//    Route::get('view_customer/{id}', 'CustomerController@show')->name('admin.view_customer');

//    Route::get('edit_customer/{id}', 'CustomerController@edit')->name('admin.edit_customer');

//    Route::post('update_customer/{id}', 'CustomerController@update')->name('admin.update_customer');

//    Route::get('delete_customer/{id}', 'CustomerController@destroy')->name('admin.delete_customer');

	

	

	//manage route

	Route::get('manage_route', 'HomeController@manage_route')->name('admin.manage_route');

    Route::post('getroute_by_driver_id', 'HomeController@getroute_by_driver_id')->name('admin.getroute_by_driver_id');

	Route::post('get_edit_order_form', 'HomeController@get_edit_order_form')->name('admin.get_edit_order_form');

	

	//manage driver by order id

	Route::post('manage_drive_by_order_id', 'HomeController@manage_drive_by_order_id')->name('admin.manage_drive_by_order_id');

	

	

	Route::get('manage_page', 'HomeController@manage_page')->name('admin.manage_page');

	Route::get('add_page', 'HomeController@add_page')->name('admin.add_page');

	Route::post('insert_page', 'HomeController@insert_page')->name('admin.insert_page');	

	Route::get('edit_page/{id}', 'HomeController@edit_page')->name('admin.edit_page');

	Route::post('edit_page/{id}', 'HomeController@update_page')->name('admin.update_page');
	
	Route::get('delete_page/{id}', 'HomeController@delete_page')->name('admin.delete_page');


	

	//manage vehicle

	Route::get('manage_vehicle', 'HomeController@manage_vehicle')->name('admin.manage_vehicle');

	Route::get('add_vehicle', 'HomeController@add_vehicle')->name('admin.add_vehicle');

    Route::get('manage_video', 'HomeController@manage_video')->name('admin.manage_video');

    Route::get('add_video', 'HomeController@add_video')->name('admin.add_video');





	Route::post('insert_video', 'HomeController@insert_video')->name('admin.insert_video');

    Route::post('insert_vehicle', 'HomeController@insert_vehicle')->name('admin.insert_vehicle');	

	Route::get('edit_video/{id}', 'HomeController@edit_video')->name('admin.edit_video');

    Route::post('update_video/{id}', 'HomeController@update_video')->name('admin.update_video');

    Route::get('edit_vehicle/{id}', 'HomeController@edit_vehicle')->name('admin.edit_vehicle');

	Route::post('edit_vehicle/{id}', 'HomeController@update_vehicle')->name('admin.update_vehicle');

	

	// Manage Projects

	Route::get('manage_project', 'HomeController@manage_project')->name('admin.manage_project');

	Route::get('add_project', 'HomeController@add_project')->name('admin.add_project');

	Route::post('insert_project', 'HomeController@insert_project')->name('admin.insert_project');	

	Route::get('edit_project/{id}', 'HomeController@edit_project')->name('admin.edit_project');

	Route::post('update_project/{id}', 'HomeController@update_project')->name('admin.update_project');

    Route::get('delete_project/{id}', 'HomeController@delete_project')->name('admin.delete_project');


	// Manage Project Category

	Route::get('manage_project_cat', 'HomeController@manage_project_category')->name('admin.manage_project_category');

	Route::get('add_project_cat', 'HomeController@add_project_category')->name('admin.add_project_category');

	Route::post('insert_project_cat', 'HomeController@insert_project_category')->name('admin.insert_project_category');

	Route::get('edit_project_cat/{id}', 'HomeController@edit_project_category')->name('admin.edit_project_category');

	Route::post('update_project_cat/{id}', 'HomeController@update_project_category')->name('admin.update_project_category');

	Route::get('delete_project_cat/{id}', 'HomeController@delete_project_category')->name('admin.delete_project_category');

    // Customer Order

   // Route::get('manage_order', 'CustomerController@manage_order')->name('admin.manage_order');

//	

//	Route::get('edit_order/{id}', 'CustomerController@edit_order')->name('admin.edit_order');

//	

//	

//	Route::post('edit_order/{id}', 'CustomerController@update_order')->name('admin.update_order');

//    Route::get('list_full_customer_order/{id}', 'CustomerController@view_full_customer_order')->name('admin.view_full_customer_order');

//    

//    //order

//    Route::get('list_order', 'OrderController@list_order')->name('admin.list_order');

//    Route::get('list_full_order/{id}', 'OrderController@view_full_order')->name('admin.view_full_order');



    // Verify

    // Route::get('email/resend', 'Auth\VerificationController@resend')->name('admin.verification.resend');

    // Route::get('email/verify', 'Auth\VerificationController@show')->name('admin.verification.notice');

    // Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('admin.verification.verify');

	

	Route::get('manage_category', 'HomeController@manage_category')->name('admin.manage_category');

	Route::get('add_category', 'HomeController@add_category')->name('admin.add_category');

	Route::post('insert_category', 'HomeController@insert_category')->name('admin.insert_category');

	Route::get('edit_category/{id}', 'HomeController@edit_category')->name('admin.edit_category');

	Route::post('update_category/{id}', 'HomeController@update_category')->name('admin.update_category');

	Route::get('delete_category/{id}', 'HomeController@delete_category')->name('admin.delete_category'); 

	

	

	//manage level

	Route::get('manage_level', 'HomeController@manage_level')->name('admin.manage_level');

	Route::get('add_level', 'HomeController@add_level')->name('admin.add_level');

	Route::post('insert_level', 'HomeController@insert_level')->name('admin.insert_level');

	Route::get('edit_level/{id}', 'HomeController@edit_level')->name('admin.edit_level');

	Route::post('update_level/{id}', 'HomeController@update_level')->name('admin.update_level');

	Route::get('delete_level/{id}', 'HomeController@delete_level')->name('admin.delete_level');



	//manage questions

	Route::get('manage_questions', 'HomeController@manage_questions')->name('admin.manage_questions');

	Route::get('add_questions', 'HomeController@add_questions')->name('admin.add_questions');

	Route::post('insert_questions', 'HomeController@insert_questions')->name('admin.insert_questions');

	Route::get('edit_questions/{id}', 'HomeController@edit_questions')->name('admin.edit_questions');

	Route::post('update_questions/{id}', 'HomeController@update_questions')->name('admin.update_questions');

	Route::get('delete_questions/{id}', 'HomeController@delete_questions')->name('admin.delete_questions');

	Route::post('getlevel','HomeController@getlevel')->name('admin.getlevel');

	Route::post('getType','HomeController@getType')->name('admin.getType');

	Route::post('find_questions','HomeController@find_questions')->name('admin.find_questions');

	

	//manage products

	Route::get('add_products', 'HomeController@add_products')->name('admin.add_products');

	Route::post('insert_products', 'HomeController@insert_products')->name('admin.insert_products');

	Route::get('manage_products', 'HomeController@manage_products')->name('admin.manage_products');

	Route::get('edit_products/{id}', 'HomeController@edit_products')->name('admin.edit_products');

	Route::post('update_products/{id}', 'HomeController@update_products')->name('admin.update_products');

	Route::get('delete_products/{id}', 'HomeController@delete_products')->name('admin.delete_products');


	//manage products Variation Images

	Route::post('variation_images', 'HomeController@variation_images')->name('admin.variation_images');

	

	//manage customer

	Route::get('manage_customer', 'HomeController@manage_customer')->name('admin.manage_customer');

	Route::get('add_customer', 'HomeController@add_customer')->name('admin.add_customer');

	Route::post('insert_customer', 'HomeController@insert_customer')->name('admin.insert_customer');

	Route::get('edit_customer/{id}', 'HomeController@edit_customer')->name('admin.edit_customer');
	
	Route::post('update_customer', 'HomeController@update_customer')->name('admin.update_customer');

	//manage oreder

	Route::get('manage_order', 'HomeController@manage_order')->name('admin.manage_order');

	Route::get('view_order/{id}', 'HomeController@view_order')->name('admin.view_order');

	Route::get('view_order_customer/{id}', 'HomeController@view_order_customer')->name('admin.view_order_customer');

	Route::get('edit_order/{id}', 'HomeController@edit_order')->name('admin.edit_order');

	Route::post('update_view_order', 'HomeController@update_view_order')->name('admin.update_view_order');
	
	Route::get('delete_view_order/{id}', 'HomeController@delete_view_order')->name('admin.delete_view_order');
	
	Route::post('update_payment_status', 'HomeController@update_payment_status')->name('admin.update_payment_status');


	// manage blog

	Route::get('manage_blog', 'HomeController@manage_blog')->name('admin.manage_blog');

	Route::get('add_blog', 'HomeController@add_blog')->name('admin.add_blog');

	Route::post('insert_blog', 'HomeController@insert_blog')->name('admin.insert_blog');

	Route::get('edit_blog/{id}', 'HomeController@edit_blog')->name('admin.edit_blog');

	Route::post('update_blog/{id}', 'HomeController@update_blog')->name('admin.update_blog');

	Route::get('delete_blog/{id}', 'HomeController@delete_blog')->name('admin.delete_blog');

    // manage coupons
    
    Route::get('manage_coupons', 'HomeController@manage_coupons')->name('admin.manage_coupons');
    
    Route::get('add_coupons', 'HomeController@add_coupons')->name('admin.add_coupons');
    
    Route::post('insert_coupons', 'HomeController@insert_coupons')->name('admin.insert_coupons');
    
    Route::get('edit_coupons/{id}', 'HomeController@edit_coupons')->name('admin.edit_coupons');
    
    Route::post('update_coupons/{id}', 'HomeController@update_coupons')->name('admin.update_coupons');

	Route::get('delete_coupons/{id}', 'HomeController@delete_coupons')->name('admin.delete_coupons');

	//manage attribute

	Route::get('manage_attribute', 'HomeController@manage_attribute')->name('admin.manage_attribute');

	Route::get('add_attribute', 'HomeController@add_attribute')->name('admin.add_attribute');

	Route::post('insert_attribute', 'HomeController@insert_attribute')->name('admin.insert_attribute');

	Route::get('edit_attribute/{id}', 'HomeController@edit_attribute')->name('admin.edit_attribute');

	Route::post('update_attribute/{id}', 'HomeController@update_attribute')->name('admin.update_attribute');

	Route::get('delete_attribute/{id}', 'HomeController@delete_attribute')->name('admin.delete_attribute');


	//manage attribute value

	Route::get('manage_attribute_value/{id}', 'HomeController@manage_attribute_value')->name('admin.manage_attribute_value');

	Route::get('add_attribute_value/{id}', 'HomeController@add_attribute_value')->name('admin.add_attribute_value');

	Route::post('insert_attribute_value/{id}', 'HomeController@insert_attribute_value')->name('admin.insert_attribute_value');

	Route::get('edit_attribute_value/{id}', 'HomeController@edit_attribute_value')->name('admin.edit_attribute_value');

	Route::post('update_attribute_value/{id}', 'HomeController@update_attribute_value')->name('admin.update_attribute_value');

	Route::get('delete_attribute_value/{id}', 'HomeController@delete_attribute_value')->name('admin.delete_attribute_value');

    // manage menu
    
	Route::get('manage_menu', 'HomeController@manage_menu')->name('admin.manage_menu');
	
	Route::get('add_menu', 'HomeController@add_menu')->name('admin.add_menu');

    Route::post('insert_menu', 'HomeController@insert_menu')->name('admin.insert_menu');

    Route::get('edit_menu/{id}', 'HomeController@edit_menu')->name('admin.edit_menu');

    Route::post('update_menu/{id}', 'HomeController@update_menu')->name('admin.update_menu');
    
    Route::get('delete_menu/{id}', 'HomeController@delete_menu')->name('admin.delete_menu');
    
    //manage menu value
    
	Route::get('manage_menu_value/{id}', 'HomeController@manage_menu_value')->name('admin.manage_menu_value');
	
	Route::get('add_menu_value/{id}', 'HomeController@add_menu_value')->name('admin.add_menu_value');
	
	Route::post('insert_menu_value/{id}', 'HomeController@insert_menu_value')->name('admin.insert_menu_value');
	
	Route::post('title_value', 'HomeController@title_value')->name('admin.title_value');
	
	Route::post('edit_title_value', 'HomeController@edit_title_value')->name('admin.edit_title_value');
	
	Route::get('edit_menu_value/{id}', 'HomeController@edit_menu_value')->name('admin.edit_menu_value');

	Route::post('update_menu_value/{id}', 'HomeController@update_menu_value')->name('admin.update_menu_value');

	Route::get('delete_menu_value/{id}', 'HomeController@delete_menu_value')->name('admin.delete_menu_value');
	
	Route::get('manage_sub_menu/{id}', 'HomeController@manage_sub_menu')->name('admin.manage_sub_menu');
	
	
	
    // manage currency
    Route::get('manage_currency', 'HomeController@manage_currency')->name('admin.manage_currency');
	
	Route::get('add_currency', 'HomeController@add_currency')->name('admin.add_currency');

    Route::post('insert_currency', 'HomeController@insert_currency')->name('admin.insert_currency');

    Route::get('edit_currency/{id}', 'HomeController@edit_currency')->name('admin.edit_currency');

    Route::post('update_currency/{id}', 'HomeController@update_currency')->name('admin.update_currency');
    
    Route::get('delete_currency/{id}', 'HomeController@delete_currency')->name('admin.delete_currency');
    
     // googel review
	 Route::get('manage_google_review', 'HomeController@manage_google_review')->name('admin.manage_google_review');
	 Route::get('add_google_review', 'HomeController@add_google_review')->name('admin.add_google_review');
	 Route::post('insert_google_review', 'HomeController@insert_google_review')->name('admin.insert_google_review');
	  Route::get('edit_google_review/{id}', 'HomeController@edit_google_review')->name('admin.edit_google_review');
	   Route::post('update_google_review/{id}', 'HomeController@update_google_review')->name('admin.update_google_review');
	    Route::get('delete_google_review/{id}', 'HomeController@delete_google_review')->name('admin.delete_google_review');
	 

	//payment
	Route::get('payment', 'HomeController@payment')->name('admin.payment');

	Route::get('add_payment', 'HomeController@add_payment')->name('admin.add_payment');

	Route::get('manage_payment/{id}', 'HomeController@manage_payment')->name('admin.manage_payment');

	Route::post('insert_payment', 'HomeController@insert_payment')->name('admin.insert_payment');

	Route::post('update_payment/{id}', 'HomeController@update_payment')->name('admin.update_payment');


	//shipping
	Route::get('shipping', 'HomeController@shipping')->name('admin.shipping');

	Route::get('add_shipping', 'HomeController@add_shipping')->name('admin.add_shipping');

	Route::get('manage_shipping/{id}', 'HomeController@manage_shipping')->name('admin.manage_shipping');

	Route::post('insert_shipping', 'HomeController@insert_shipping')->name('admin.insert_shipping');

	Route::get('edit_shipping/{id}', 'HomeController@edit_shipping')->name('admin.edit_shipping');

	Route::post('update_shipping/{id}', 'HomeController@update_shipping')->name('admin.update_shipping');

	Route::get('delete_shipping/{id}', 'HomeController@delete_shipping')->name('admin.delete_shipping');

	Route::get('edit_shipping_method_setting/{id}', 'HomeController@edit_shipping_method_setting')->name('admin.edit_shipping_method_setting');

	Route::post('update_shipping_method_setting/{id}', 'HomeController@update_shipping_method_setting')->name('admin.update_shipping_method_setting');

	Route::post('add_shipping_method', 'HomeController@add_shipping_method')->name('admin.add_shipping_method');

	Route::get('delete_shipping_method/{id}', 'HomeController@delete_shipping_method')->name('admin.delete_shipping_method');


	//manage Email

	Route::get('manage_email', 'HomeController@manage_email')->name('admin.manage_email');

	//Route::get('add_email', 'HomeController@add_email')->name('admin.add_email');

	Route::post('insert_email', 'HomeController@insert_email')->name('admin.insert_email');

	Route::get('edit_email/{id}', 'HomeController@edit_email')->name('admin.edit_email');

	Route::post('update_email/{id}', 'HomeController@update_email')->name('admin.update_email');

	Route::get('delete_email/{id}', 'HomeController@delete_email')->name('admin.delete_email');

	Route::post('update_email_setting/{id}', 'HomeController@update_email_setting')->name('admin.update_email_setting');

	//ecommerce setting

	Route::get('ecommerce_setting', 'HomeController@ecommerce_setting')->name('admin.ecommerce_setting');

	Route::post('update_ecommerce_setting/{id}', 'HomeController@update_ecommerce_setting')->name('admin.update_ecommerce_setting');

    //home Page setting
    
    Route::get('homepage_setting', 'HomeController@homepage_setting')->name('admin.homepage_setting');
// 	Route::post('homepage_setting/update/{id}', 'HomeController@update_homepage_setting')->name('admin.update_homepage_setting');
Route::post('homepage_setting/update/{id}', 'HomeController@update_homepage_setting')->name('admin.update_homepage_setting');
	// Enquiry 

	Route::get('add_enquiry', 'HomeController@add_enquiry')->name('admin.add_enquiry');

	Route::post('insert_enquiry', 'HomeController@insert_enquiry')->name('admin.insert_enquiry');

	Route::get('manage_enquiry', 'HomeController@manage_enquiry')->name('admin.manage_enquiry');

	Route::get('edit_enquiry/{id}', 'HomeController@edit_enquiry')->name('admin.edit_enquiry');

	Route::post('update_enquiry/{id}', 'HomeController@update_enquiry')->name('admin.update_enquiry');

	Route::get('delete_enquiry/{id}', 'HomeController@delete_enquiry')->name('admin.delete_enquiry');



	// ajax

	Route::post('get_attrbute_drop_dowm', 'HomeController@get_attrbute_drop_dowm')->name('admin.get_attrbute_drop_dowm');

	Route::post('get_edit_pro_attrbute_drop_dowm', 'HomeController@get_edit_pro_attrbute_drop_dowm')->name('admin.get_edit_pro_attrbute_drop_dowm');
	
	Route::post('save_attrbute', 'HomeController@save_attrbute')->name('admin.save_attrbute');

	Route::post('update_attrbute', 'HomeController@update_attrbute')->name('admin.update_attrbute');

	Route::get('/clear-cache', function() {
	    Artisan::call('cache:clear');
	    return 'Application cache has been cleared';
	});

});