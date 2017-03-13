<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class M_login extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  
  public function ambilPengguna($username, $password)
  {
    $this->db->select('*');
    $this->db->from('tbuser');
    $this->db->where('USERNAME', $username);
    $this->db->where('PASSWORD', $password);
    $query = $this->db->get();
    
    return $query->row();
  } 
  
  public function dataPengguna($username)
  {
   $this->db->select('ID');
   $this->db->select('LEVEL');
   $this->db->select('NAMA_USER');
   $this->db->select('USERNAME');
   $this->db->select('USERNAME');
   $this->db->where('USERNAME', $username);
   $query = $this->db->get('tbuser');
   
   return $query->row();
  } 
}
?>
