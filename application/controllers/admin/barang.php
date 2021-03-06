<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller {
	
    	private $_template = "template";

	function __construct(){  
        parent::__construct();  
	$this->load->model('admin/m_barang');
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
		$data['page'] = 'barang_view';
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

	function tambah(){
		$this->cek_sesi();	
		$nama = $this->input->post('namabarang');
		$serial = $this->input->post('serialnumber');
		$data = array(
			'BARANG' =>$nama,
			'SERIAL_NUMBER' =>$serial,
			'STATUS'=> 1);
		$this->m_barang->tambah('tbbarang', $data);
		redirect('admin/barang');
	}

	function edit($id){
		
		$this->cek_sesi();
		$this->load->model('m_login');
      
		$user = $this->session->userdata('USERNAME');
		$nama = $this->session->userdata('NAMA_USER');
		      
		$data['level'] = $this->session->userdata('LEVEL');        
		$data['pengguna'] = $this->m_login->dataPengguna($user, $nama);	
		
		
		if($this->input->post('submit')){
		//echo"asdasd";exit();
		$this->m_barang->update($id);
   		redirect('admin/barang');
		}

		$data['hasil']=$this->m_barang->getById($id);
		$data['page'] = 'edit_barang';
  		$this->load->view($this->_template,$data);
		
	 }


	function hapus($id){
  		$this->m_barang->delete($id);
		redirect('admin/barang');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
