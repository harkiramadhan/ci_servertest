<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phpmailer extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
    }
    function index(){
        $this->load->view('email');
    }
    function send(){
        $this->load->library('PHPMailer_lib');
        $mail = $this->phpmailer_lib->load();
        
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'harkiramadhan@gmail.com';
        $mail->Password = 'jakartaselatan';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        
        $mail->setFrom('harkiramadhan@gmail.com', 'HarkiRamadhan');
        $mail->addReplyTo('info@harkiramadhan.com', 'HarkiRamadhan');
        
        $mail->addAddress('madanzdanz@gmail.com');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
        
        $mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';
        
        $mail->isHTML(true);
        $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
            <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
        $mail->Body = $mailContent;

        redirect($_SERVER['HTTP_REFERER']);
    }
    
}