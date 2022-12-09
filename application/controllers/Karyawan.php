<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
  function __construct(){
		parent::__construct();

			$this->load->model('Karyawan_model');
		$this->load->library('form_validation'); 
    if ($this->session->userdata('username') AND $this->session->userdata('password') AND $this->session->userdata('level')=='admin') {
      redirect(base_url('login'));
	}

	
	public function index()
	{
        $data['list'] = $this->Karyawan_model->getall();

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar-left');
		$this->load->view('Karyawan/list',$data);
		$this->load->view('template/footer');
	}
   function insert()
   {
       $data['Dept'] = $this->Karyawan_model->getDepartemen();
         $data['Jabt'] = $this->Karyawan_model->getJabatan();
    $this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar-left');
		$this->load->view('Karyawan/insert',$data);
		$this->load->view('template/footer');
   }
   function save()
   {
       $data = array(
                 'namaKaryawan' => $this->input->post('namaKaryawan', TRUE),
                  'jabatan' => $this->input->post('jabatan', TRUE),
                 'createdDate' => date('Y-m-d'),
                 'idDepartemen' => $this->input->post('idDepartemen', TRUE)             
            );

            $this->Karyawan_model->insert($data);
            $this->session->set_flashdata('notif', '<div class="alert alert-primary alert-dismissible"> Success! data berhasil disimpan didatabase. </div>');
            redirect('Karyawan');
   }

   function edit($id)

   {
         $row = $this->Karyawan_model->get_by_id($id);
           $Dept = $this->Karyawan_model->getDepartemen();
         $Jabt = $this->Karyawan_model->getJabatan();
       if ($row) {

       	$data = array(               
              'namaKaryawan' =>set_value('namaKaryawan',$row->namaKaryawan),
              'idDepartemen' =>set_value('idDepartemen',$row->idDepartemen),  
              'jabatan' =>set_value('jabatan',$row->jabatan),   
              'id' => set_value('id', $row->id),
               'Jabt' => $Jabt ,
               'Dept' =>$Dept       
              );
        }
          $this->load->view('template/header');
	        $this->load->view('template/sidebar-left');
          $this->load->view('Karyawan/edit',$data);
          $this->load->view('template/footer');
       
   }

   function update ()
   {
       $id = $this->input->post('id', TRUE);
       $data = array(
                'namaKaryawan' => $this->input->post('namaKaryawan', TRUE),
                'idDepartemen' => $this->input->post('idDepartemen', TRUE),
                'jabatan' => $this->input->post('jabatan', TRUE),
                'modifyDate' => date('Y-m-d')                  
               
            );

       // echo "<pre>";
       // print_r($data);
       // echo "</pre>";
       // exit();
             
            $this->Karyawan_model->update($data,$id);
           $this->session->set_flashdata('notif', '<div class="alert alert-primary alert-dismissible"> Success! data berhasil diubah didatabase.
                                                </div>');
            redirect('Karyawan');
   }

     function delete()
   {
         $id=$this->input->post('id');
        $this->Karyawan_model->delete($id);
         $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Success! data berhasil di hapus.
                                                </div>');
        redirect('Karyawan');
   }

}
