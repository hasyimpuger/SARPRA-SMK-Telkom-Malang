<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barangs extends CI_Controller {
	
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
		$data['page'] = 'barang_view';
		$data['hasil'] = $this->m_barang->getAll();
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

	 	function tambahaksi(){
		
		$nama = $this->input->post('namabarang');
		$serial = $this->input->post('serialnumber');
		$data = array(
			'BARANG' =>$nama,
			'SERIAL_NUMBER' =>$serial);
		$this->m_barang->input_data($data,'tbbarang');
		redirect(base_url('index.php/admin/barang/'));
	}


	function update(){
		$ID = $this->input->post('ID');
		$nama = $this->input->post('BARANG');
		$serial = $this->input->post('SERIAL_NUMBER');
		
		$data = array(
			'BARANG' => $nama,
			'SERIAL_NUMBER' => $serial);
		$where = array(
			'ID' => $ID);
		$this->m_barang->update_data($where,$data,'tbbarang');
		redirect('admin/barang');
	}

function hapus($ID){
		$where = array('ID' => $ID);
		$this->m_user->hapus_data($where,'tbbarang');
		redirect('admin/barang');
	}


	function edit($ID){
	$this->cek_sesi();
	$this->load->model('m_login');
      
	$user = $this->session->userdata('USERNAME');
	$nama = $this->session->userdata('NAMA_USER');
	      
	$data['level'] = $this->session->userdata('LEVEL');        
	$data['pengguna'] = $this->m_login->dataPengguna($user, $nama);	

		$where = array('ID' => $ID);
		$data['tbbarang'] = $this->m_barang->edit_data($where,'tbbarang')->result();
		$this->load->view('header',$data);
		$this->load->view('edit_barang',$data);
	}
}
