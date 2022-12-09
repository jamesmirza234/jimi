<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
		$this->load->view('polis/list',$data);
		$this->load->view('template/footer');
	}

	function insert()
   {
    
  
     	$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar-left');
		$this->load->view('polis/insert');
		$this->load->view('template/footer');
   }
  function tes()
   {
   	 $curl = curl_init();
   
    curl_setopt_array($curl, array(
    	 CURLOPT_URL => 'http://services.jp.co.id/api/dummy/index.php/Verification?nopolis=1',
    
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 20,
      CURLOPT_TIMEOUT => 600,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
    	

    /*  echo "cURL Error #:" . $err;*/
    } else {
      $conversion  = json_decode($response,True);
       if($conversion['status'] ==404)
       {
       	echo '<script type="text/javascript">';
echo 'document.write("No. Polis Tidak Di temukan")';
echo '</script>';
       }else
       {
       		echo '<script type="text/javascript">';
echo 'document.write("No. Polis ada")';
echo '</script>';
       }
      

  }
}
   function save ()
   {
     $polis = $this->input->post('polis');
   	 $curl = curl_init();
    curl_setopt_array($curl, array(
    	 CURLOPT_URL => 'http://services.jp.co.id/api/dummy/index.php/Verification?nopolis='.$polis.'',
    
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 20,
      CURLOPT_TIMEOUT => 600,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
    
      /*echo "cURL Error #:" . $err;*/
    } else {
      $conversion  = json_decode($response,True);
         if($conversion['status'] ==404)
       {
           	echo '<script type="text/javascript">';
            echo 'document.write("No. Polis Tidak Di temukan")';
            echo '</script>';
       }else
       {
         $data= array(
            'nomorpolis' =>$polis,
            'namadebitur'=>$conversion['namadebitur'],
            'pekerjaan'=>$conversion['pekerjaan'],
            'jeniskelamin'=>$conversion['jeniskelamin'],
            'alamat'=>$conversion['alamat'],
            'nilaipertanggungan'=>$conversion['nilaipertanggungan'],
            'premi'=>$conversion['premi']
         
          );
        
          $this->db->where('nomorpolis',$nomorpolis);
          $sql = $this->db->count_all_results('tbl_polis');
          if ($sql == 0) {
            $this->db->insert('tbl_polis',$data);
            echo '<pre>' . $this->db->last_query() . '</pre>';
            
          }else
          {
            $this->db->where('nomorpolis',$nomorpolis);         
            $this->db->update('tbl_polis',$data);
            echo '<pre>' . $this->db->last_query() . '</pre>';
            $this->db->close();
          }
           redirect('dashboard');

       }
          
        }
        

   /*   echo "<pre>";
      print_r($conversion['refno']);
      echo "</pre>";*/
      /*$this->load->model('Polis_model');
      $this->M_databts->get_country($conversion['results']);*/
    
   }

}
