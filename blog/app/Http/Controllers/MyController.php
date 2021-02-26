<?php
	namespace App\Http\Controllers;

	use App\Models\User;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;

	class MyController extends Controller{

		function select()
		{
			 $dbname = DB::select('select * from students');
			 return  $dbname;
		}
		function insert(Request $request)
		{
				$name   = $request->input('name');	 
				$age    = $request->input('age');	 
				$gender = $request->input('gender');	 
				$phone  = $request->input('phone');	 
				$city   = $request->input('city');	 
				$data = "INSERT INTO students (name,age,gender,phone,city) VALUES(?,?,?,?,?)";
				$insert = DB::insert($data, [$name,$age,$gender,$phone, $city]);
				if($insert==true)
				{
					return "Data inserted successfully";
				}

		}
		function update(Request $request)
		{
				$id     = $request->input('id');	 
				$name   = $request->input('name');	 
				$age    = $request->input('age');	 
				$gender = $request->input('gender');	 
				$phone  = $request->input('phone');	 
				$city   = $request->input('city');	 
				$data   = "UPDATE students SET name=?, age=?,gender=?, phone=?, city=? WHERE id=?";
				$update = DB::update($data, [$name,$age,$gender,$phone, $city, $id]);
				if($update==true)
				{
					return $id." Data updated successfully";
				}

		}
		function delete(Request $request)
		{
			$data   = "DELETE FROM students WHERE id=?";
			$id= $request->input('id');
			$delete = DB::delete($data,[$id]);
			if($delete==true)
			{
				return "Data has been deleted";
			}
		}
			 
		
	}