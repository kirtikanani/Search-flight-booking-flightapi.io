<?php



namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;

use App\Providers\RouteServiceProvider;

use App\Models\User;

use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;



class RegisterController extends Controller

{

    /*

    |--------------------------------------------------------------------------

    | Register Controller

    |--------------------------------------------------------------------------

    |

    | This controller handles the registration of new users as well as their

    | validation and creation. By default this controller uses a trait to

    | provide this functionality without requiring any additional code.

    |

    */



    use RegistersUsers;



    /**

     * Where to redirect users after registration.

     *

     * @var string

     */

  

        

    protected $redirectTo = RouteServiceProvider::HOME;



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        

        $this->middleware('guest');

    }



    public function showRegistrationForm()

    {

        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';

		$host = $_SERVER['HTTP_HOST'];


        return view("auth.register"); 

    }

    /**

     * Get a validator for an incoming registration request.

     *

     * @param  array  $data

     * @return \Illuminate\Contracts\Validation\Validator

     */

    protected function validator(array $data)

    {
        

        return Validator::make($data, [

            'firstname' => ['required', 'string'],

            'lastname' => ['required', 'string'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);

    }



    

    /**

     * Create a new user instance after a valid registration.

     *

     * @param  array  $data

     * @return \App\Models\User

     */

    protected function create(array $data)

    {

        session()->forget('user_login');
        session()->save();
        
		$varicode = md5(microtime(true).mt_Rand());

		$user_create = User::create([

            'name' => $data['firstname'].' '.$data['lastname'],

            'email' => $data['email'],

            'password' => Hash::make($data['password']),

            'Phone' => $data['Phone'],

			

        ]);

		

	

		if(!empty($user_create->id))

		{


            session()->put('user_login', $user_create);
            $request->session()->save();

			$update_data=array('variations'=>$varicode, 'id' => $user_create->id);

			$update= DB::table('users')->where('id',$user_create->id)->update($update_data); 

			$to=$data['email'];

			$sub='Email Variations';

// 			$msg="https://sofkpvtltd.com/fashion_export/?variations=".$varicode."&id=".$user_create->id;

			

// 			$template = 'emails.varification';

			

// 			$msg = view($template, $update_data)->render();

            $msg =  view('emails.varification', $update_data)->render();

            $headers = "";

            $headers .= "MIME-Version: 1.0\r\n";

            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";	

			

			mail($to,$sub,$msg, $headers);

		}

        return $user_create;

    }

}

