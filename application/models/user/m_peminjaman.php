<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class M_peminjaman extends CI_Model{  
 
 function getById($id){ //mengambil data berdasarkan id (primary key)
  return $this->db->get_where('view_peminjaman',array('user'=>$id))->result();
 }

}
