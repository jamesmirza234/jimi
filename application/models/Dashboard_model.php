<?php 
class Dashboard_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
  function getDatapeminjaman ()
  {

    $query = $this->db->query('SELECT * FROM tbl_pinjamheader');
   $jmlpeminjam = $query->num_rows();


    

    if(!empty($jmlpeminjam))
    {
      return $jmlpeminjam;
    }else
    {
      return array();
    }
  }

   function getDatapengembalian ()
  {

    $query = $this->db->query('SELECT * FROM tbl_kembaliheader');
   $data = $query->num_rows();    

    if(!empty($data))
    {
      return $data;
    }else
    {
      return array();
    }
  }
 
 
  function getall()
  {
  	$data = $this->db->get('tbl_barang');

		if(!empty($data))
		{
			return $data->result();
		}else
		{
			return array();
		}

	}

	function insert($data)
	{

        $this->db->insert('tbl_barang', $data);
        
	}
	  function get_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->limit(1);
        return $this->db->get('tbl_barang')->row();
    }

     public function delete($id)

    {
                  $this->db->where('id',$id);
         $query = $this->db->delete("tbl_barang");

        if($query){
            return true;
        }else{
            return false;
        }
    }

     public function update($data, $id)
    {
                 $this->db->where('id',$id);
        $query = $this->db->update("tbl_barang",$data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

}