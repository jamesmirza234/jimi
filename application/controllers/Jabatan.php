<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {
  function __construct(){
		parent::__construct();

			$this->load->model('Jabatan_model');
		  $this->load->library('form_validation'); 
      if ($this->session->userdata('username') AND $this->session->userdata('password') AND $this->session->userdata('level')=='admin') {
      redirect(base_url('login'));
	}

	
	public function index()
	{
        $data['list'] = $this->Jabatan_model->getall();

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar-left');
		$this->load->view('Jabatan/list',$data);
		$this->load->view('template/footer');
	}
   function insert()
   {
     	$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar-left');
		$this->load->view('Jabatan/insert');
		$this->load->view('template/footer');
   }
   function save()
   {
       $data = array(
                'namaJabatan' => $this->input->post('namaJabatan', TRUE),
                'createdDate'=>date('Y-m-d')
            );

            $this->Jabatan_model->insert($data);
            $this->session->set_flashdata('notif', '<div class="alert alert-primary alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');
            redirect('Jabatan');
   }

   function edit($id)

   {
         $row = $this->Jabatan_model->get_by_id($id);
       if ($row) {
       	$data = array(               
              'namaJabatan' =>set_value('namaJabatan',$row->namaJabatan),
              'id' => set_value('id', $row->id)
                      
              );
        }
          $this->load->view('template/header');
	        $this->load->view('template/sidebar-left');
          $this->load->view('Jabatan/edit',$data);
          $this->load->view('template/footer');
 
       
   }

   function update ()
   {
       $id = $this->input->post('id', TRUE);
       $data = array(
                'namaJabatan' => $this->input->post('namaJabatan', TRUE),               
                'modifyDate' =>date('Y-m-d')
            );
            $this->Jabatan_model->update($data,$id);
           $this->session->set_flashdata('notif', '<div class="alert alert-primary alert-dismissible"> Success! data berhasil diubah didatabase.
                                                </div>');
            redirect('Jabatan');
   }

     function delete()
   {
         $id=$this->input->post('id');
        $this->Jabatan_model->delete($id);
         $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Success! data berhasil di hapus.
                                                </div>');
        redirect('Jabatan');
   }

}
