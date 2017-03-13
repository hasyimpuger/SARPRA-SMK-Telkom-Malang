<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class M_pengajuan extends CI_Model{  
 function getAll(){
  $ambil_data = $this->db->query("SELECT * FROM `view_pengajuan` WHERE `validasi` = '1'");
  //print_r($ambil_data);exit();
  if ($ambil_data->num_rows() > 0 ){
   foreach ($ambil_data->result() as $data){
    $hasil[] = $data;
   }
   return $hasil;
  }
 }

function confirm($id){   
  return $this->db->query("UPDATE tbpeminjaman SET VALIDASI='2' WHERE ID='$id'");
}

 function getVerif(){
  $ambil_data = $this->db->query("SELECT * FROM `view_pengajuan` WHERE `validasi` = '2'");
  //print_r($ambil_data);exit();
  if ($ambil_data->num_rows() > 0 ){
   foreach ($ambil_data->result() as $data){
    $hasil[] = $data;
   }
   return $hasil;
  }
 }

}
