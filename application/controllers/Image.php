<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller {

		 public function AddImage(){
		 	
		 		$this->authHeaders();
		 	try{
		 			$req = __request();
					$this->db->insert('image_store',$req);
					echo __responce(true,'Image Uploaded Success!','Done');
		 	}
		 	catch (Exception $ex){
						echo __responce(false,'Error While Uploading Image!','Error');
		 	}
		 	
		 }