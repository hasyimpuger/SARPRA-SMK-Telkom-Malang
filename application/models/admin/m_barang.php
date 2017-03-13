<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class M_barang extends CI_Model{  
 function getall(){
  $ambil_data = $this->db->get('view_barang');
  if ($ambil_data->num_rows() > 0 ){
   foreach ($ambil_data->result() as $data){
    $hasil[] = $data;
   }
   return $hasil;
  }
 }

    function getById($id){ 
  return $this->db->get_where('tbbarang',array('ID'=>$id))->row();
 }

    function tambah($table,$data){
    $this->db->insert($table,$data);
  }

  function update($where,$table){   
  return $this->db->get_where($table,$where);
}



    function delete($id){ 
  $this->db->where('ID',$id);
  $this->db->delete('tbbarang');
 }

}
