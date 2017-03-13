<?php defined('BASEPATH') or exit('No direct script access allowed');

class Smtp extends \CI_Controller{

    public function index($email, $subjects, $messages){
        // Set SMTP Configuration
        $emailConfig = [
            'protocol' => 'smtp', 
            'smtp_host' => 'ssl://smtp.googlemail.com', 
            'smtp_port' => 465, 
            'smtp_user' => '', //email 
            'smtp_pass' => '',//password 
            'mailtype' => 'html', 
            'charset' => 'iso-8859-1'
        ];

        // Set your email information
        $from = [
            'email' => '', //email
            'name' => 'Administrator'
        ];
        $to = array($email);
        $subject = $subjects;
      //  $message = 'Type your gmail message here';
        $message =  $messages;
        // Load CodeIgniter Email library
        $this->load->library('email', $emailConfig);
        // Sometimes you have to set the new line character for better result
        $this->email->set_newline("\r\n");
        // Set email preferences
        $this->email->from($from['email'], $from['name']);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        // Ready to send email and check whether the email was successfully sent
        if (!$this->email->send()) {
            // Raise error message
            show_error($this->email->print_debugger());
        }
    }
}
