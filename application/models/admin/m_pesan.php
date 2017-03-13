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
function tambah(){
  $judul = $this->input->post('judul'); 
  $detail  = $this->input->post('perihal');
  $dana  = $this->input->post('dana');
  $data = array (
   'NAMA_PENGAJUAN' => $judul,
   'TANGGAL_PENGAJUAN'  => date('Y-m-d'),
   'DETAIL_PENGAJUAN'  => $detail,
   'TOTAL_DANA' => $dana,
   'STATUS' => "1"
  ); 
//print_r($data);exit();
  $this->db->insert('tb_pengadaan',$data);
 }
}
