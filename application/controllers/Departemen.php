<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departemen extends CI_Controller {
  function __construct(){
		parent::__construct();

			$this->load->model('Departemen_model');
		$this->load->library('form_validation'); 
    if ($this->session->userdata('username') AND $this->session->userdata('password') AND $this->session->userdata('level')=='admin') {
      redirect(base_url('login'));
	}

	
	public function index()
	{
        $data['list'] = $this->Departemen_model->getall();

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar-left');
		$this->load->view('Departemen/list',$data);
		$this->load->view('template/footer');
	}
   function insert()
   {
     	$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar-left');
		$this->load->view('Departemen/insert');
		$this->load->view('template/footer');
   }
   function save()
   {
       $data = array(
                'namaDepartemen' => $this->input->post('namaDepartemen', TRUE),
               
            );

            $this->Departemen_model->insert($data);
            $this->session->set_flashdata('notif', '<div class="alert alert-primary alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');
            redirect('Departemen');
   }

   function edit($id)

   {
         $row = $this->Departemen_model->get_by_id($id);
       if ($row) {
       	$data = array(               
              'namaDepartemen' =>set_value('namaDepartemen',$row->namaDepartemen),
              'id' => set_value('id', $row->id)
                      
              );
        }
          $this->load->view('template/header');
	      $this->load->view('template/sidebar-left');
          $this->load->view('Departemen/edit',$data);
          $this->load->view('template/footer');
 
       
   }

   function update ()
   {
       $id = $this->input->post('id', TRUE);
       $data = array(
                'namaDepartemen' => $this->input->post('namaDepartemen', TRUE)               
               
            );
            $this->Departemen_model->update($data,$id);
           $this->session->set_flashdata('notif', '<div class="alert alert-primary alert-dismissible"> Success! data berhasil diubah didatabase.
                                                </div>');
            redirect('Departemen');
   }

     function delete()
   {
         $id=$this->input->post('id');
        $this->Departemen_model->delete($id);
         $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Success! data berhasil di hapus.
                                                </div>');
        redirect('Departemen');
   }

}
