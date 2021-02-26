<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

use \Firebase\JWT\JWT;

class StudentController extends Controller
{
   function select(Request $request)
   {
   	$token = $request->input('Token');

   	$data = Student::all();
   	return response()->json([$data]);
   }

   function insert(Request $request)
   {
   		$token = $request->input('Token');
        $key   = env('TOKEN_KEY');
    	$email    = $request->input('email');
    	$phone    = $request->input('phone');
    	$password  = $request->input('password');
    	$decoded = JWT::decode($token, $key, array('HS256'));
    	$array = (array)$decoded;
    	$username = $array['user'];
    	$count = Student::where('email',$email)->count();
    	if($count==1)
    	{
    		return "User already exists";
    	}
    	else{
    		$student           = new Student();
    		$student->username =$username;
    		$student->email    =$email;
    		$student->phone    =$phone;
    		$student->password = md5($password);
    		$insert            = $student->save();
    		if($insert==true)
    		{
    			return "Data Insert Successfully";
    		}
    	}
   }  

   function update(Request $request)
   {
   		$id = $request->input('id');
   		$username = $request->input('username');
    	$email    = $request->input('email');
    	$phone    = $request->input('phone');
    	$password  = $request->input('password');
    	$update = Student::where('id', $id)->update([
    			'username'=>$username,
    			'email'=>$email,
    			'phone'=>$phone,
    			'password'=>md5($password)
    		]);
    		if($update==true)
    		{
    			return "Data Updated Successfully";
    		}
    	
   }  

   function delete(Request $request)
   {
   	 $id = $request->input('id');

   	 $delete = Student::where('id', $id)->delete();
   	 if($delete==true)
   	 {
   	 	return "Data Deleted Successfully";
   	 }
   }

}
