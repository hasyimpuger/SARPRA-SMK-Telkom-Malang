<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
    	private $_template = "template";

	function __construct(){  
        parent::__construct();  
	$this->load->model('admin/m_user');
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
 		$data['hasil'] = $this->m_user->getAll();
		$data['page'] = 'user_view';
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
	$user = $this->input->post('username');
	$pass = $this->input->post('password');
	$level = $this->input->post('level');
	$data = array(
		'USERNAME' =>$user,
		'PASSWORD' =>$pass,
		'LEVEL'=> $level);
	//print_r($data);exit();
	$this->m_user->tambah('tbuser', $data);
		redirect('admin/user');
	 }

	function reset($id){
	$this->m_user->reset_data($id);
	redirect('admin/user');
	echo'<script>
            $(document).ready(function() {
                  if (Notification.permission !== "granted")
                    Notification.requestPermission();
            });
             
            function notifikasi() {
                if (!Notification) {
                    alert("Browser tidak mendukung Notification."); 
                    return;
                }
                if (Notification.permission !== "granted")
                    Notification.requestPermission();
                else {
                    var notifikasi = new Notification("Reset Password Berhasil", {
                        icon: "http://upct.siakad.org/images_siakad/metroui/logo-siakad-pct.png",
                        body: "Lakukan login dengan menggunakan username dan password yang sama!",
                    });
                    notifikasi.onclick = function () {
                        window.open("http://k.siakad.org");      
                    };
                    setTimeout(function(){
                        notifikasi.close();
                    }, 5000);
                }
            };
        </script>';
	 }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
