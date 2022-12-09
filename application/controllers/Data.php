<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
    function __construct(){
		parent::__construct();
       $this->load->model('Data_model');
	}
      function getalldataprofiller()
      {
         $data = $this->Data_model->getalldataprofiler();
         echo json_encode($data);

      }

      function getalldatauser()
      {
      	 $data = $this->Data_model->getalldatauser();
         echo json_encode($data);
      	 
      }

      function savedatauser()
      {
      	 $data = array(
        'email'=>$this->input->post('email'),
         'password'=>$this->input->post('password'),
   	   );
   	     $this->Data_model->insertdatauser($data);
     
      }

  }