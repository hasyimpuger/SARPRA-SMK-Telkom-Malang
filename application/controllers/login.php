<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    
    $this->load->model('m_login');
    
    $this->load->library(array('form_validation','session'));
    
    $this->load->database();
    
    $this->load->helper('url');
    
  }  
  
  public function index()
  {
    $session = $this->session->userdata('isLogin');
    
      if($session == FALSE)
      {
        $this->load->view('login');
      }
  }
  
  public function signin()
  {
    $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
    $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
    
      if($this->form_validation->run()==FALSE)
      {
        $this->load->view('login');
      }else
      {
       $username = $this->input->post('username');
       $password = $this->input->post('password');

       $cek = $this->m_login->ambilPengguna($username, $password);
	if($cek){
        if($cek->LEVEL == 1)
        {

          $this->session->set_userdata('isLogin', TRUE);
	  $this->session->set_userdata('ID'); 
          $this->session->set_userdata('USERNAME',$username);
          $this->session->set_userdata('LEVEL',$cek->level);
         
         redirect('admin/dashboard.html');
		}elseif($cek->LEVEL == 2)
        {

          $this->session->set_userdata('isLogin', TRUE);
	  $this->session->set_userdata('ID'); 
          $this->session->set_userdata('USERNAME',$username);
          $this->session->set_userdata('LEVEL',$cek->level);
         redirect('user/dashboard.html');
        }else
        {
         $this->session->set_flashdata('status', "<strong>gagal mengotentikasi, Harap cek username dan password anda</strong>");
          $this->session->set_flashdata('clr', 'danger');
        }
      }
	else
	{ 
	  $this->session->set_flashdata('status', "<strong>Gagal mengotentikasi, Harap cek username dan password anda</strong>");
          $this->session->set_flashdata('clr', 'danger');
	}
	  redirect('login');
	}	  
  }
  
  public function logout()
  {
   $this->session->sess_destroy();
   redirect('login');
  }
}
?>
