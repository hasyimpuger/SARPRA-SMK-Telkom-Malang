<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class M_user extends CI_Model{  
 function getall(){
  $ambil_data = $this->db->get('view_user');
  if ($ambil_data->num_rows() > 0 ){
   foreach ($ambil_data->result() as $data){
    $hasil[] = $data;
   }
   return $hasil;
  }
 }

    function tambah($table,$data){
    $this->db->insert($table,$data);
  }

function reset_data($id){ //update data berdasarkan nim
  $this->db->query("UPDATE `tbuser` SET `PASSWORD`= USERNAME WHERE ID = $id");
 }

}
