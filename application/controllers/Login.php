<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
public function __construct()
    {
    parent::__construct();
        if ($this->session->userdata('username') AND $this->session->userdata('password') AND $this->session->userdata('level')=='admin') {
      redirect(base_url('login'));
    }
   
    $this->load->library('form_validation');
  }
public function index()
  {
    $this->load->view('login');
  }

  public function aksi_login(){
  
    $username = $this->input->post('username');
  $password = $this->input->post('password');
 /* print_r(md5($password));
  exit();*/

                $this->db->where('username',$username);
                /*$this->db->where('password',$password);*/
                $this->db->where('password',md5($password));
        $cek =  $this->db->get('tbl_user')->row();
   
  if(!empty($cek)){
 
    $data_session = array(
      'nama' => $username,
      'iduser' => $cek->id,
      'status' => "login"
      );
 
    $this->session->set_userdata($data_session);
      
    redirect(base_url("dashboard"));
  }else{
      $this->session->set_flashdata('notif', 'failed wrong username or password !!');
    redirect(base_url("login"));
  }
}

     function logout(){
     

   $this->session->sess_destroy($this->session->userdata('username'));

    redirect(base_url('login'));

}


}