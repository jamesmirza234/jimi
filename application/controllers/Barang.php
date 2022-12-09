<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
  function __construct(){
		parent::__construct();

			$this->load->model('Barang_model');
		$this->load->library('form_validation'); 
    if ($this->session->userdata('username') AND $this->session->userdata('password') AND $this->session->userdata('level')=='admin') {
      redirect(base_url('login'));
	}

	
	public function index()
	{
        $data['list'] = $this->Barang_model->getall();

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar-left');
		$this->load->view('Barang/list',$data);
		$this->load->view('template/footer');
	}
   function insert()
   {
    
    $data['kode_barang'] = $this->Barang_model->CreateCode();
    

     	$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar-left');
		$this->load->view('Barang/insert',$data);
		$this->load->view('template/footer');
   }
   function save()
   {
       $data = array(
                'namaBarang' => $this->input->post('namaBarang', TRUE),
                'kodeBarang' => $this->input->post('kodeBarang', TRUE),
                'satuan' => $this->input->post('satuan', TRUE),
                'kategori' => $this->input->post('kategori', TRUE),
                'stokAwal' => $this->input->post('stokAwal', TRUE),
                'stokAkhir' => $this->input->post('stokAwal', TRUE)
            );

            $this->Barang_model->insert($data);
            $this->session->set_flashdata('notif', '<div class="alert alert-primary alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');
            redirect('Barang');
   }

   function edit($id)

   {
         $row = $this->Barang_model->get_by_id($id);
       if ($row) {
       	$data = array(               
                 'namaBarang' =>set_value('namaBarang',$row->namaBarang),
                'id' => set_value('id', $row->id),
                'kodeBarang' => $this->input->post('kodeBarang', TRUE),
                'satuan' => $this->input->post('satuan', TRUE),
                'kategori' => $this->input->post('kategori', TRUE),
                'stokAwal' => $this->input->post('stokAwal', TRUE)
                      
              );
        }
          $this->load->view('template/header');
	      $this->load->view('template/sidebar-left');
          $this->load->view('Barang/edit',$data);
          $this->load->view('template/footer');
 
       
   }

   function update ()
   {
       $id = $this->input->post('id', TRUE);
       $data = array(
                'namaBarang' => $this->input->post('namaBarang', TRUE)               
               
            );
            $this->Barang_model->update($data,$id);
           $this->session->set_flashdata('notif', '<div class="alert alert-primary alert-dismissible"> Success! data berhasil diubah didatabase.
                                                </div>');
            redirect('Barang');
   }

     function delete()
   {
         $id=$this->input->post('id');
        $this->Barang_model->delete($id);
         $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Success! data berhasil di hapus.
                                                </div>');
        redirect('Barang');
   }

}
