<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemController extends CI_Controller {
   public function __construct(){
      parent::__construct();
      $this->load->database();
   }

   public function index(){
      $this->load->view('page');
   }
   
   public function ajaxSave(){  
      $this->load->library('PHPMailer_lib');
      $mail = $this->phpmailer_lib->load();

      $tanggal_terima      = $this->input->post('tanggal_terima');   
      $agenda              = $this->input->post('agenda');
      $nomor_surat         = $this->input->post('nomor_surat');
      $tanggal_surat       = $this->input->post('tanggal_surat');
      $dari                = $this->input->post('dari');
      $kepada              = $this->input->post('kepada');
      $perihal             = $this->input->post('perihal');
      $dodate              = $this->input->post('dodate');
      $jenis               = $this->input->post('jenis');
      $tanggal_keluar      = $this->input->post('tanggal_keluar');
      $penerima            = $this->input->post('penerima');
      $gh                  = $this->input->post('gh');
      $disposisi           = $this->input->post('disposisi');
      $document            = $this->input->post('document');
      $email               = explode(",", $gh);
      
      foreach ($email as $addr) {
         $mail->addAddress($addr);
      }

      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'harkiramadhan@gmail.com';
      $mail->Password   = 'jakartaselatan';
      $mail->SMTPSecure = 'ssl';
      $mail->Port       = 465;
        
      $mail->setFrom('harkiramadhan@gmail.com', 'HarkiRamadhan');
      $mail->addReplyTo('info@harkiramadhan.com', 'HarkiRamadhan');
        
      // $mail->addAddress('madanzdanz@gmail.com');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');
        
      $mail->Subject = 'Persuratan Masuk Group - '.$perihal;
        
      $mail->isHTML(true);
      $mailContent = "
         <h2>Persuratan Masuk Group</h2>
         <table>
            <tr><td>Dari</td>                  <td>:</td> <td><b>$dari</b></td></tr>
            <tr><td>Agenda</td>                <td>:</td> <td><b>$agenda</b></td></tr>
            <tr><td>Do Date</td>               <td>:</td> <td><b>$dodate</b></td> </tr>
            <tr><td>Catatan Group Head </td>   <td>:</td> <td><b>$disposisi</b></td> </tr>   
            <tr><td>Download Document</td>     <td>:</td> <td><b>$document</b></td> </tr>
         </table>
         <h4>Do Not Reply To This Email</h4>
      ";
      $mail->Body = $mailContent;

      if(!$mail->send()){
         echo 'Message could not be sent.';
         echo 'Mailer Error: ' . $mail->ErrorInfo;
      }else{
            echo 'Message has been sent';
      }
   }

   public function ajaxSaveDept(){
      $this->load->library('PHPMailer_lib');
      $mail = $this->phpmailer_lib->load();

      $tanggal_terima      = $this->input->post('tanggal_terima');   
      $agenda              = $this->input->post('agenda');
      $nomor_surat         = $this->input->post('nomor_surat');
      $tanggal_surat       = $this->input->post('tanggal_surat');
      $dari                = $this->input->post('dari');
      $kepada              = $this->input->post('kepada');
      $perihal             = $this->input->post('perihal');
      $dodate              = $this->input->post('dodate');
      $jenis               = $this->input->post('jenis');
      $tanggal_keluar      = $this->input->post('tanggal_keluar');
      $penerima            = $this->input->post('penerima');
      $dh                  = $this->input->post('dh');
      $disposisi           = $this->input->post('disposisi');
      $document            = $this->input->post('document');
      $email               = explode(",", $dh);
      
      foreach ($email as $addr) {
         $mail->addAddress($addr);
      }

      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'harkiramadhan@gmail.com';
      $mail->Password   = 'jakartaselatan';
      $mail->SMTPSecure = 'ssl';
      $mail->Port       = 465;
        
      $mail->setFrom('harkiramadhan@gmail.com', 'HarkiRamadhan');
      $mail->addReplyTo('info@harkiramadhan.com', 'HarkiRamadhan');
        
      // $mail->addAddress('madanzdanz@gmail.com');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');
        
      $mail->Subject = 'Persuratan Masuk Dept - '.$perihal;
        
      $mail->isHTML(true);
      $mailContent = "
         <h2>Persuratan Masuk Dept</h2>
         <table>
            <tr><td>Dari</td>                   <td>:</td> <td><b>$dari</b></td></tr>
            <tr><td>Agenda</td>                 <td>:</td> <td><b>$agenda</b></td></tr>
            <tr><td>Do Date</td>                <td>:</td> <td><b>$dodate</b></td> </tr>
            <tr><td>Catatan Dept Head </td>     <td>:</td> <td><b>$disposisi</b></td> </tr>   
            <tr><td>Download Document</td>      <td>:</td> <td><b>$document</b></td> </tr>
         </table>
         <h4>Do Not Reply To This Email</h4>
      ";
      $mail->Body = $mailContent;

      if(!$mail->send()){
         echo 'Message could not be sent.';
         echo 'Mailer Error: ' . $mail->ErrorInfo;
      }else{
            echo 'Message has been sent';
      } 
   }

   public function ajaxRequestPost(){
      $data = array(
         "tanggal_terima"        => $this->input->post('tanggal_terima'),
         "agenda"                => $this->input->post('agenda'),
         "nomor_surat"           => $this->input->post('nomor_surat'),
         "tanggal_surat"         => $this->input->post('tanggal_surat'),
         "dari"                  => $this->input->post('dari'),
         "kepada"                => $this->input->post('kepada'),
         "perihal"               => $this->input->post('perihal'),
         "dodate"                => $this->input->post('dodate'),
         "jenis"                 => $this->input->post('jenis'),
         "tanggal_keluar"        => $this->input->post('tanggal_keluar'),
         "penerima"              => $this->input->post('penerima'),
         "gh"                    => $this->input->post('gh'),
         "disposisi"             => $this->input->post('disposisi'),
         "document"              => $this->input->post('document'),
     );
     $this->db->insert('surat_masuk', $data);
   }
}