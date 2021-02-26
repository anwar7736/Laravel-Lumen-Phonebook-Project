<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Registration;

use \Firebase\JWT\JWT;

class LoginController extends Controller
{
    function Login(Request $request)
    {
    	$username = $request->input('username');
    	$password  = $request->input('password');

    	$count = Registration::where(['username'=>$username, 'password'=>$password])->count();
    	if($count==1)
    	{
    		
			$key = env('TOKEN_KEY');
			$payload = array(
			    "web" => "http://anwar.com",
			    "user" => "Anwar",
			    "iat" => time(),
			    "exp" => time()+3600
			);

			$jwt = JWT::encode($payload, $key);

			return response()->json(['Token'=>$jwt, 'Status'=>'Login Success']);
    	}
    	else{
    			return "Username or Password is wrong!";
    		}
    }
}
