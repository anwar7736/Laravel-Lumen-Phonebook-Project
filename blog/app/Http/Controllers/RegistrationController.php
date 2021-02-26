<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Registration;

class RegistrationController extends Controller
{
    function Registration(Request $request)
    {
    	$username = $request->input('username');
    	$email    = $request->input('email');
    	$password  = $request->input('password');

    	$count = Registration::where('email',$email)->count();
    	if($count==1)
    	{
    		return "User already exists";
    	}
    	else{
    		$insert = Registration::insert([
    			'username'=>$username,
    			'email'=>$email,
    			'password'=>$password
    		]);
    		if($insert==true)
    		{
    			return "Registration Successfully";
    		}
    	}
    }
}
