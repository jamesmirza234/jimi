<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class Polis extends CI_Controller {
      function __construct(){
		parent::__construct();

	   $this->load->model('Polis_model');
		$this->load->library('form_validation'); 
   
	}

	public function index()
	{
        $data['list'] = $this->Polis_model->getall();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar-left');
		$this->load->view('polis',$data);
		$this->load->view('template/footer');
	}


	}