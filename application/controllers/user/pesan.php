<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesan extends CI_Controller {
	
    	private $_template = "template";

	function __construct(){  
        parent::__construct();  
	$this->load->model('user/m_pesan');
	$this->load->helper(array('url','form'));
	}

	public function index()
	{
		$this->cek_sesi();
		$this->load->model('m_login');
      
		$user = $this->session->userdata('USERNAME');
		$nama = $this->session->userdata('NAMA_USER');
		      
		$data['level'] = $this->session->userdata('LEVEL');        
		$data['pengguna'] = $this->m_login->dataPengguna($user, $nama);		
 		$data['hasil'] = $this->m_barang->getAll();
		$data['page'] = 'pesan_view';
  		$this->load->view($this->_template,$data);
	}

	public function cek_sesi(){
	    if($this->session->userdata('isLogin') == FALSE)
	    {
	      redirect('login/signin');
	    }else
	    {
	    
	      $this->load->model('m_login');
	      
	      $user = $this->session->userdata('USERNAME');
	      $nama = $this->session->userdata('NAMA_USER');
	      
	      $data['level'] = $this->session->userdata('LEVEL');        
	      $data['pengguna'] = $this->m_login->dataPengguna($user, $nama);
	    }
	 }

	public function message(){
	$this->cek_sesi();
	$this->load->model('m_login');
      
	$user = $this->session->userdata('USERNAME');
	$nama = $this->session->userdata('NAMA_USER');
	      
	$data['level'] = $this->session->userdata('LEVEL');        
	$data['pengguna'] = $this->m_login->dataPengguna($user, $nama);		

	$pesan = $this->input->post('pesan');
	$data = array (
	  'SEND_BY' => $user,
	  'SEND_TO'  => "admin",
	  'MESSAGE'  => $pesan,
	  'SEND_TIME'  => date('Y-m-d H:i:s',now())
	); 
	$this->m_pesan->addPesan('tbpesan', $data);
	redirect('user/home');
	 }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
