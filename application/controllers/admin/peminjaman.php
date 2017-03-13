<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peminjaman extends CI_Controller {
	
    	private $_template = "template";

	function __construct(){  
        parent::__construct();  
	$this->load->model('admin/m_pinjam');
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
 		$data['hasil'] = $this->m_pinjam->getAll();
		$data['page'] = 'peminjaman_view';
  		$this->load->view($this->_template,$data);
	}

	public function verifikasi()
	{
		$this->cek_sesi();
		$this->load->model('m_login');
      
		$user = $this->session->userdata('USERNAME');
		$nama = $this->session->userdata('NAMA_USER');
		      
		$data['level'] = $this->session->userdata('LEVEL');        
		$data['pengguna'] = $this->m_login->dataPengguna($user, $nama);		
 		$data['hasil'] = $this->m_pinjam->getVerif();
		$data['page'] = 'peminjaman_verif_view';
  		$this->load->view($this->_template,$data);
	}

	function cek_sesi(){
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

	function confirm($id){
		$this->cek_sesi();	
		$user = $this->session->userdata('USERNAME');
                $nama = $this->session->userdata('NAMA_USER');
	      
	        $data['level'] = $this->session->userdata('LEVEL');        
	        $data['pengguna'] = $this->m_login->dataPengguna($user, $nama);
		
		$barang = $this->input->post('barang');
		$date = date('Y-m-d');
		$this->m_pinjam->konfirmasi($id, $date);
		$this->m_pinjam->barang($barang);
		redirect('admin/peminjaman');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
