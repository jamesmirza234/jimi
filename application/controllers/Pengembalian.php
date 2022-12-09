<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {
  function __construct(){
		parent::__construct();
     $this->load->library('fpdf/fpdf');
			$this->load->model('Pengembalian_model');
		$this->load->library('form_validation'); 
    if ($this->session->userdata('username') AND $this->session->userdata('password') AND $this->session->userdata('level')=='admin') {
      redirect(base_url('login'));
	}
}
   function print($id)
  {
    

             $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',12);
        // mencetak string 

        $pdf->Cell(190,7,'Pengembalian Asset IT',0,1,'C');
          $pdf->SetFont('Arial','',10);
         $pdf->Cell(190,7,'----------------------------------------------------------------------------------------------------------------------------------------------------------------',0,0,0);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',9,);
     
        $this->db->where('kdKembali',$id);
        $pinjamheader = $this->db->get('tbl_kembaliheader')->row();

                       $this->db->where('jabatan','Manager');
                        $this->db->where('idDepartemen','IT');
        $tblkaryawan = $this->db->get('tbl_karyawan')->row();
           $pdf->Cell(25,6,'Kode Kembali : ',0,0,0);
           $pdf->Cell(25,6,$pinjamheader->kdKembali,0,1,0);
           $pdf->Cell(25,6,'Tgl Kembali : ',0,0,0);
           $pdf->Cell(25,6,$pinjamheader->tglKembali,0,1,0);
          
        $pdf->SetFont('Arial','B',12,'L');
      
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(25,6,'Kode Barang',1,0);
        $pdf->Cell(85,6,'Nama Barang',1,0);
        $pdf->Cell(27,6,'Satuan',1,0);
        $pdf->Cell(25,6,'Kategori',1,0);
        $pdf->Cell(10,6,'Qty',1,0,1,);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','',10);
                     $this->db->where('kdKembali',$id);
        $pinjamdetail = $this->db->get('tblkembalidetail')->result();
        foreach ($pinjamdetail as $row){
            $pdf->Cell(25,6,$row->kodeBarang,1,0);
            $pdf->Cell(85,6,$row->namaBarang,1,0);
            $pdf->Cell(27,6,$row->satuan,1,0);
            $pdf->Cell(25,6,$row->kategori,1,0); 
            $pdf->Cell(10,6,$row->jml,1,1); 

        }
             $pdf->Cell(10,7,'',0,1);
             $pdf->SetFont('Arial','B',10,'L');
             $pdf->Cell(28,6,'Peminjam',0,0,0);
             $pdf->Cell(140,6,'Approval',0,1,'R');
           
             
             $pdf->Cell(10,7,'',0,1);
             $pdf->Cell(10,7,'',0,1);
             $pdf->Cell(35,6, $pinjamheader->karyawan ,0,1,0);
             $pdf->Cell(180,6,$tblkaryawan->namaKaryawan,0,0,'R');
             

          
             
        $pdf->Output();
  }
    function get_autocompletebarang(){
       if (isset($_GET['term'])) {
        $result = $this->Pengembalian_model->search_barang($_GET['term']);
        if (count($result) > 0) {
            foreach ($result as $row)
           
                $arr_result[] = $row->namaBarang;
         
                echo json_encode($arr_result);
        }
    }

    
    }
function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->Pengembalian_model->search_karyawan($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->namaKaryawan;
                echo json_encode($arr_result);
            }
        }
    }

	public function index()
	{
        $data['list'] = $this->Pengembalian_model->getall();        
       
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar-left');
		$this->load->view('Pengembalian/list',$data);
		$this->load->view('template/footer');
	}
   function insert()
   {
    
    $data['kdKembali'] = $this->Pengembalian_model->CreateCode();
     $data['Barang'] = $this->Pengembalian_model->getBarang();
 
     	$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar-left');
		$this->load->view('Pengembalian/insert',$data);
		$this->load->view('template/footer');
   }
   function save()
   {
        $relative_data  = $this->input->post('data_table');
        $relative_dataheader  = $this->input->post('data_header');
        $this->Pengembalian_model->saveHeader($relative_dataheader);
        $this->Pengembalian_model->save($relative_data);
        $this->output->set_content_type('application/json');
        echo json_encode(array('status' => 'status'));
   
   }

   function edit($id)

   {
         $row = $this->Pengembalian_model->get_by_id($id);
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
          $this->load->view('Pengembalian/edit',$data);
          $this->load->view('template/footer');
 
       
   }

   function update ()
   {
       $id = $this->input->post('id', TRUE);
       $data = array(
                'namaBarang' => $this->input->post('namaBarang', TRUE)               
               
            );
            $this->Pengembalian_model->update($data,$id);
           $this->session->set_flashdata('notif', '<div class="alert alert-primary alert-dismissible"> Success! data berhasil diubah didatabase.
                                                </div>');
            redirect('Barang');
   }

     function delete()
   {
         $id=$this->input->post('id');
       
        $this->Pengembalian_model->delete($id);
         $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Success! data berhasil di hapus.
                                                </div>');
        redirect('Pengembalian');
   }

}
