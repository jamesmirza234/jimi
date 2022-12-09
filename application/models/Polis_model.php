<?php 
class Polis_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

function getall()
  {
  	$data = $this->db->get('tbl_polis');

		if(!empty($data))
		{
			return $data->result();
		}else
		{
			return array();
		}

	}
}