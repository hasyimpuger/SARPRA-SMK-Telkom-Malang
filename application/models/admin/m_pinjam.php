<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class M_pinjam extends CI_Model{  
 function getAll(){
  $ambil_data = $this->db->query("SELECT * FROM `view_peminjaman` WHERE `validasi` = '2' AND `STATUS`='3'");
  //print_r($ambil_data);exit();
  if ($ambil_data->num_rows() > 0 ){
   foreach ($ambil_data->result() as $data){
    $hasil[] = $data;
   }
   return $hasil;
  }
 }

function konfirmasi($id, $date){  
$this->db->query("UPDATE `tbpeminjaman` SET `VALIDASI`='4', `STATUS`='4', `TGL_PENGEMBALIAN`='$date' WHERE `ID` = '$id'");
 
 /*$data = array (
   'VALIDASI' => "4",
   'TGL_PENGEMBALIAN'  => $date,
   'STATUS' => "4"
  );
print_r($data);exit();
  $this->db->where('ID',$id);
  $this->db->update('tbpeminjaman',$data);*/
}

function barang($barang){   
$this->db->query("UPDATE `tbbarang` SET `STATUS`='1' WHERE `ID` = '$barang'");
}

 function getVerif(){
  $ambil_data = $this->db->query("SELECT * FROM `view_peminjaman` WHERE `STATUS`='4'");
  //print_r($ambil_data);exit();
  if ($ambil_data->num_rows() > 0 ){
   foreach ($ambil_data->result() as $data){
    $hasil[] = $data;
   }
   return $hasil;
  }
 }

}
