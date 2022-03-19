<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	// *
	//  * Index Page for this controller.
	//  *
	//  * Maps to the following URL
	//  * 		http://example.com/index.php/welcome
	//  *	- or -
	//  * 		http://example.com/index.php/welcome/index
	//  *	- or -
	//  * Since this controller is set as the default controller in
	//  * config/routes.php, it's displayed at http://example.com/
	//  *
	//  * So any other public methods not prefixed with an underscore will
	//  * map to /index.php/welcome/<method_name>
	//  * @see https://codeigniter.com/user_guide/general/urls.html
	 

	public function __construct()
	{
		parent::__construct();											//parent is an part of constructor	
		$this->load->database();										//Loading of dabase To get the databse
	}
	public function index()
	{
		$this->load->view('welcome_message');
		 $image = \Config\Services::image();

	}

//To Update	the students values

	public function Update(){
		// print_r($_POST);
		$this->authHeaders();
		try{
			$req= __request();			
			//$req = json_decode($_POST['data'], true);			//Data to be taken from the front
			
			//Image file upload
			// if(isset($_FILES)){

			// 	$filepath = '/uploads/image-'.time().'.jpg';	     
			// 	move_uploaded_file($_FILES["dp"]["tmp_name"], '.'.$filepath);
			// 	$req['user_image'] = site_url2.$filepath;
			// }

		 	// $data = array(
		// 		'first_name' => $req['First_Name'],
		// 		'middle_name' => $req['Middle_Name'],
		// 		'last_name' => $req['Last_Name'],
		// 		'gender'=> $req['Gender'],
		// 		'contact_number' =>$req['Contact_Number'],
		// 		'email_id' => $req['Email'],
		// //		'dob' => $req['DateOfBirth'],
		// 		'address' => $req['Address'],
		// 		'city' => $req['City'],
		// 		'country' => $req['Country'],
		// 		'state' => $req['State'],
		// 		'pin' => $req['Pin'],
		// 		'display_name' => $req['Display_Name'],
		// 		'user_image' => $req['User_Image'],
		// 		'id_url' => $req['ID_URL'],
		// 		'pref_language' => $req['Pref_Lang'],
		// 		'education' => $req['Education'],
		// 		'stream' => $req['Stream'],
		// 		'university' => $req['University'],
		// 		'hobbys' => $req['Hobbies'],
		// 		'experiance' => $req['Experience'],
		// 		'account_name' => $req['Account_Name'],
		// 		'account_ifsc' => $req['Account_IFSC'],
		// 		'account_no' => $req['Account_No'],
		// 		'external_links' => $req['External_Links'],
		// //		'password' => $req['Password'],
		// 		'activation_link' => $req['Activation_link'],
		// 		'mobile_ver_code' => $req['MobileVer_Code'],
		// 		'is_mobile_verified' => $req['IsMobileVerified'],
		// 		'status' => $req['Status'],
		// 		'access_token' => $req['Access_Token'],
		// 		'register_from' => $req['Register_From'],
		// 		'appRegId' => $req['AppRegId'],
		// 		'updated_date' => $req['Updated_Date'],
		// 		'added_date' => $req['Added_Date'],
		// 		'is_deleted' => $req['IsDeleted'] 
			// );
		 	$this->db->where('u_id', $req['u_id']);
		 	$this->db->update('lt_students', $req);
		 	// this->db->update('lt_teachers',$req)

//Helper Declared To Show the Responces
//using Associative array in array
//
		 	//echo __responce(true, 'test', array('test' => array('test' => 'test')));

//using normal messages..

		 	echo __responce(true,'Record Update Success','Done');

//by using Associative Array..

		 	// echo __responce(true,'Record Success',array('test' =>'By Array'));

		} catch (Exception $e){
			// echo json_encode(array('status'=> false, 'msg'=> $e));
					 	echo __responce(false,'Error while Updating Records','Error');

		}
		
	}

//To Add Student Records 

		public function AddRecord()
		{
			$this->authHeaders();
				
		try{
				// print_r();
			//exit;
			$req = json_decode($_POST['data'],true);
			if(isset($_FILES)){
				$filepath = '/uploads/image-'.time().'.jpg';	     
				move_uploaded_file($_FILES["dp"]["tmp_name"], '.'.$filepath);
				$req['user_image'] = site_url2.$filepath;
				// \Config\Services::image('imagick')
				 // ->withFile('site_url2.$filepath')
     //             ->resize(200, 100, true, 'height')
     // 			->save('site_url2.$filepath');
				
			}

				//$req = __request();
				// print_r(__request());
			
				// $data2 = array(
				// 'first_name' => $req['First_Name'],
				// 'middle_name' => $req['Middle_Name'],
				// 'last_name'=> $req['Last_Name'],
				// 'gender'=> $req['Gender'],
				// 'contact_number' =>$req['Contact_Number'],
				// 'email_id' => $req['Email'],
				// 'dob' => $req['DateOfBirth'],
				// 'address' => $req['Address'],
				// 'city' => $req['City'],
				// 'country' => $req['Country'],
				// 'state' => $req['State'],
				// 'pin' => $req['Pin'],
				// 'display_name' => $req['Display_Name'],
				// 'user_image' => $req['User_Image'],
				// 'id_url' => $req['ID_URL'],
				// 'pref_language' => $req['Pref_Lang'],
				// 'education' => $req['Education'],
				// 'stream' => $req['Stream'	],
				// 'university' => $req['University'],
				// 'hobbys'=>$req['Hobbies'],
				// 'experiance' => $req['Experiance'], 
				// 'account_name' => $req['Account_Name'],
				// 'account_ifsc' => $req['Account_IFSC'],
				// 'account_no' => $req['Account_No'],
				// 'external_links'=>$req['External_Links'],
				// 'password' => $req['Password'],
				// 'activation_link' => $req['Activation_link'],
				// 'mobile_ver_code' => $req['MobileVer_Code'],
				// 'is_mobile_verified' => $req['IsMobileVerified'],
				// 'status' => $req['Status'],
				// 'access_token' => $req['Access_Token'],
				// 'register_from' => $req['Register_From'],
				// 'appRegId' => $req['AppRegId'],
				// 'updated_date' => $req['Updated_Date'],
				// 'added_date' => $req['Added_Date'],
				// 'is_deleted' => $req['IsDeleted'] 
				// );


				// ///$this->authHeaders();
					$this->db->insert('lt_students',$req);
					echo __responce(true,'Record Inserted Successfully','User Creation Success');
		
			
			// echo json_encode(array('status'=>true,'msg'=>'Record Insert Success'));
			}
 		catch (Exception $e){
			// echo json_encode(array('status'=> false, 'msg'=> $e));

					echo __responce(false,'Error While Inserting Record!','Error');
		}
	}

//For Adding Feeddback 
public function AddFeedback()
{
	$this->authHeaders();
	try{

				$req = __request();			
				$this->db->insert('bml_session_feedback',$req);
				echo __responce(true,'Feedback Success','True');

		}
	catch(Exception $ex)	
	{
		echo __responce(false,'Error While Adding the Record!','Error');
	}	

}

//To Get Student Record

		public function GetUser()
		{
			try
			{	
				$this->authHeaders();
				$req = $_GET;
				$res = $this->db->get_where('lt_teachers',array('u_id' => $req['id']));
				//echo json_encode(array('status'=>true,'data'=>$res->row()));
				echo __responce(true,'Record Success',$res->row());
			}
			catch(Exception $ex)
			{
				// echo json_encode(array('status'=>false,'msg'=>$ex));
				echo __responce(false,'Error while Fetching Records!','Error');
			}
		}



//To get all users data
		public function GetAll()
		{
			try{
				// $req = $_GET;
				$this->authHeaders();
				$data = $this->db->get('lt_students');
				//print_r($data->result());
				echo __responce(true,'Record Success',$data->result());

			}
			catch(Exception $ex)
			{
				echo __responce(false,'Error while Fetching the Record!','Error');
			}
		}
// 

public function GetAllData(){
	try{
		$this->authHeaders();
		$data = $this->db->get('lt_students');
		echo __responce(true,'Record Success',$data->result());
	}catch(Exception $ex){
		echo __responce(false,'Error While Fetching the Record!','Error');
	}
}

// 

//To Delete Student Record

		public function DeleteUser()
		{
			try
			{
				$this->authHeaders();
				$req = $_GET;
				$res =$this->db->delete('lt_students',array('u_id' => $req['id']));
				echo __responce(true,'Record Deleted','Done');

				// echo json_encode(array('status'=>true,'msg'=>'Record Deleted Succss'));
			}
			catch (Exception $ex)
			{
				// echo json_encode(array('status'=>false,'msg'=>$ex));
					echo __responce(false,'Error While Deleting Record','Error!');
					
			}
		}


//To Get Teacher Record

		public function GetTeacher()
		{
			try{
				$req1=$_GET;
				$res = $this->db->get_where('lt_teachers',array('u_id'=>$req1['id']));
				echo json_encode(array('status'=>true,'data'=>$res->row()));
					echo __responce(true,'Record Success','Done');

			}catch (Exception $e)
			{
				echo __responce(false,'Error While Fetching Records','Error!');
			}
		}

	public  function GetFeedback($id)
	{	
		$this->authHeaders();
	
	try{
		$data =$this->db->get_where('bml_session_feedback', array('feedback_to' => $id));
		echo __responce(true,'Record Success',$data->result());

	}catch(Exception $e)
	{
		echo __responce(false,'Error while Fetching the Records!','Error');
	}
}

//To get All Teachers Data
		public function GetAllTeachers()
		{
			try{
				$this->authHeaders();
				$data = $this->db->get('lt_teachers');
				echo __responce(true,'Record Success',$data->result());
			}
			catch(Exception $ex)
			{
				echo __responce(false,'Error While Fetching the Record!','Error');
			}
		}

//To Add Teacher Records

	public function AddTeacher()
	{
		$this->authHeaders();
		try{
			$req = __request();
			// $data1 = array(

			// 	'first_name' => $reqdata['First_Name'],
			// 	'middle_name' => $reqdata['Middle_Name'],
			// 	'last_name' => $reqdata['Last_Name'],
			// 	'gender'=> $reqdata['Gender'],
			// 	'contact_number' =>$reqdata['Contact_Number'],
			// 	'email_id' => $reqdata['Email'],
			// 	'dob' => $reqdata['DateOfBirth'],
			// 	'address' => $reqdata['Address'],
			// 	'city' => $reqdata['City'],
			// 	'country' => $reqdata['Country'],
			// 	'state' => $reqdata['State'],
			// 	'pin' => $reqdata['Pin'],
			// 	'display_name' => $reqdata['Display_Name'],
			// 	'user_image' => $reqdata['User_Image'],
			// 	'id_url' => $reqdata['ID_URL'],
			// 	'cert_url' => $reqdata['Cert_URL'],  //
			// 	'pref_language' => $reqdata['Pref_Lang'],
			// 	'education' => $reqdata['Education'],
			// 	'stream' => $reqdata['Stream'],
			// 	'year_of_passing' => $reqdata['Year_of_Passing'], //
			// 	'university' => $reqdata['University'],
			// 	'company_name' => $reqdata['CompanyName'],  //
			// 	'designation' => $reqdata['Designation'],  //
			// 	'experiance' => $reqdata['Experiance'],   //
			// 	'training' => $reqdata['Training'],  //
			// 	'book_article' =>$reqdata['Book_Article'],  //
			// 	'profile_heading' =>$reqdata['Profile_Heading'], //
			// 	'profile_desc' => $reqdata['Profile_Desc'], //
			// 	'youtube_url' =>$reqdata['YouTube_Url'],//
			// 	'student_limit' => $reqdata['Student_Limit'],//
			// 	'account_name' => $reqdata['Account_Name'],
			// 	'account_ifsc' => $reqdata['Account_IFSC'],
			// 	'account_no' => $reqdata['Account_No'],
			// 	'other_achiv'=> $reqdata['Other_Archive'],
			// 	'session_count'=>$reqdata['Session_Count'], //
			// 	'w_rate'=>$reqdata['Wrate'],//
			// 	'avg_rate'=>$reqdata['Average_rate'],
			// 	'password' => $reqdata['Password'],
			// 	'activation_link' => $reqdata['Activation_link'],
			// 	'mobile_ver_code' => $reqdata['MobileVer_Code'],
			// 	'is_mobile_verified' => $reqdata['IsMobileVerified'],
			// 	'status' => $reqdata['Status'],
			// 	'access_token' => $reqdata['Access_Token'],
			// 	'register_from' => $reqdata['Register_From'],
			// 	'appRegId' => $reqdata['AppRegId'],
			// 	'updated_date' => $reqdata['Updated_Date'],
			// 	'added_date' => $reqdata['Added_Date'],
			// 	'is_deleted' => $reqdata['IsDeleted'] 
			// );
			$this->db->insert('lt_teachers',$req);
					 	echo __responce(true,'New Record Inserted Successfully','Done');

			// $this->db->where('u_id', $reqdata['userid']);
			// $this->db->delete('lt_teachers',$data1);
		 	
	 	// echo json_encode(array('status'=> true, 'msg'=> 'Records Inserted Successfully!!!'));
		} catch (Exception $e){
			// echo json_encode(array('status'=> false, 'msg'=> $e));
					 	echo __responce(true,'Error While Inserting Records','Error');

		 }
		}


//To Delete Teacher Record

		 public function DeleteTeacher()
		 {
		 	try{
		 		$req = $_POST;
		 		$res = $this->db->delete('lt_teachers',array('u_id' =>$req['user_id']));
		 		echo __responce(true,'Record Deleted','Done');
		 	}
		 	catch (Exception $ex){
		 		echo __responce(false,'Error While Deleting Records!','Error');
		 	}

		 }


		 public function AddImage(){

		 		$this->authHeaders();
		 	try{
		 		//print_r($_FILES);
		 		//echo APPPATH;
		 		move_uploaded_file($_FILES["dp"]["tmp_name"], APPPATH.'\uploads\image-'.time().'.jpg');
		 			//$req = __request();
					//$this->db->insert('image_store',$req);
			    echo __responce(true,'Image Uploaded Success!','Done');
		 	}
		 	catch (Exception $ex){
						echo __responce(false,'Error While Uploading Image Record!','Error');
		 	}
		 	
		 }

		
		
//This following code is required when the API and the HtttpClient is on work mode
		 //basically required for the HTTTP acces to the API to connect with the angular


	 public function authHeaders($isOpen = false){
 		if (isset($_SERVER['HTTP_ORIGIN'])) {
	        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
	        header('Access-Control-Allow-Credentials: true');
	        header('Access-Control-Max-Age: 86400');    
    	}
 
    
	    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	 
	        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
	            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
	 
	        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
	            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
	 
	        exit(0);
	    }

	    //if($_SERVER['HTTP_ORIGIN'] != 'www.bml.com') echo 'Unauthorised Origin'; exit();
	    
	    // if($isOpen) return;

	    // if(!array_key_exists('Key',apache_request_headers()) || base64_decode(apache_request_headers()['Key']) != 'bmltestapi1234'){
	    // 	echo '<h2 style="color:red;">Invalid Request<small style="color:grey;"> -contact administrator</small></h2>';
	    // 	exit();
	    // }

 	}

	}