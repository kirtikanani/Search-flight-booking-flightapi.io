<?php


// namespace App\Http\Controllers\Auth; //for login

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use File;

use Razorpay\Api\Api;

use Session;

use Redirect;

use App\User;

/* for login */
//use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Support\Facades\Auth;
// use Laravel\Socialite\Facades\Socialite;
/* for login */


use Illuminate\Support\Facades\Mail;

use App\Mail\WelcomeEmail;



class HomeController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

   // public function __construct()

//    {

//        $this->middleware('auth');

//    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function index()

    {

        




		

		

	
        return view('welcome');

    }


}

