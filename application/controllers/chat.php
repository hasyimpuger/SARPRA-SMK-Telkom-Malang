<?php

class Chat extends CI_Controller
{
    public $user;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->helper(array('url', 'form'));
        $this->load->library('user_agent');

        if (!isset($this->session->userdata['isLogin']) || $this->session->userdata['isLogin'] === false) {
            redirect('welcome');
        }

        $this->user = $this->db->get_where('tbuser', array('ID' => $this->session->userdata['ID']), 1)->row();
    }

    public function index()
    {
        $teman = $this->db->where('ID !=', $this->session->userdata('ID'))->get('tbuser');
        $this->load->view('chat_dashboard', array(
            'teman' => $teman
        ));
    }

    public function getChats()
    {
        header('Content-Type: application/json');
        if ($this->input->is_ajax_request()) {
            // Find friend
            $friend = $this->db->get_where('users', array('id' => $this->input->post('chatWith')), 1)->row();

            // Get Chats
            $chats = $this->db
                ->select('chat.*, tbuser.NAMA_USER')
                ->from('chat')
                ->join('tbuser', 'chat.send_by = tbuser.ID')
                ->where('(send_by = '. $this->session->userdata('ID') .' AND send_to = '. $friend->ID .')')
                ->or_where('(send_to = '. $this->session->userdata('ID') .' AND send_by = '. $friend->ID .')')
                ->order_by('chat.time')
                ->get()
                ->result();

            $result = array(
                'NAMA_USER' => $friend->NAMA_USER,
                'chats' => $chats
            );
            echo json_encode($result);
        }
    }

    public function sendMessage()
    {
        $this->db->insert('chat', array(
            'message' => $this->input->post('message', true),
            'send_to' => $this->input->post('chatWith'),
            'send_by' => $this->session->userdata('ID')
        ));
    }
}
