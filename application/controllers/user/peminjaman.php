<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
    	private $_template = "template";
	
	function __construct(){  
        parent::__construct();  
	$this->load->model('user/m_peminjaman');
	$this->load->helper(array('url','form'));
	}

	public function index()
	{
		$this->cek_sesi();	
		$user = $this->session->userdata('USERNAME');
                $nama = $this->session->userdata('NAMA_USER');
	      
	        $data['level'] = $this->session->userdata('LEVEL');        
	        $data['pengguna'] = $this->m_login->dataPengguna($user, $nama);
		
 		$data['hasil'] = $this->m_peminjaman->getById($user);
		$data['page'] = 'user_peminjaman_view';
  		$this->load->view($this->_template,$data);
	}

	function cek_sesi(){
	    if($this->session->userdata('isLogin') == FALSE)
	    {
	      redirect('login');
	    }else
	    {
	    
	      $this->load->model('m_login');
	      
	      $user = $this->session->userdata('USERNAME');
	      $nama = $this->session->userdata('NAMA_USER');
	      
	      $data['level'] = $this->session->userdata('LEVEL');        
	      $data['pengguna'] = $this->m_login->dataPengguna($user, $nama);
	    }
	 }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
