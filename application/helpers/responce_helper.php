<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Creation of Helper and Added in the autoload page section

//For Giving The Responces To The User Through helper
if(!function_exists('__responce')){
	function __responce($status,$message,$data = array()){
		try{
			sleep(2);
			$res = json_encode(array('status' => $status,'message'=>$message,'data' => $data));
			if(!$res) throw new Exception("Error Processing Response",1);
			return $res;
		}
		catch (Exception $e)
		{
			return $res;
		}
	}
}

//For Getting the json data from the user and convert it into user readable form 

if(!function_exists('__request')){
	function __request(){
		try{															//This code is always required for 
			$req = file_get_contents('PHP://input');					//To Get The Data From API and Use into 
			$req = json_decode($req, true);					//For the CRUD operations you must use this code	
			if(!$req) throw new Exception("Error Processing Request",1);
			return $req;
		}
		catch (Exception $e)
		{
			return $e;
		}
	}
}

/* End of file responce.php */
/* Location: ./application/helpers/responce.php */