<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class M_pesan extends CI_Model{  
 function getall(){
  $ambil_data = $this->db->get('tbpesan');
  if ($ambil_data->num_rows() > 0 ){
   foreach ($ambil_data->result() as $data){
    $hasil[] = $data;
   }
   return $hasil;
  }
 }

function addPesan($table,$data){
    $this->db->insert($table,$data);
}

