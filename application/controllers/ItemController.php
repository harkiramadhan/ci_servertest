<?php


defined('BASEPATH') OR exit('No direct script access allowed');


class ItemController extends CI_Controller {


   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function __construct() {
      parent::__construct();
      $this->load->database();
   }


   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function ajaxRequest()
   {
       $this->load->view('itemlist');
   }


   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function ajaxSave()
   {  
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

      $config = array(
         'portocol'     => 'smtp',
         'smtp_host'    => 'ssl://smtp.gmail.com',
         'smtp_port'    => '465',
         'smtp_user'    => 'harkiramadhan@gmail.com',
         'smtp_pass'    => 'jakartaselatan',
         'charset'      => 'utf-8',
         'newline'      => "\r\n",
         'mailtype'     => 'html',
         'validation'   => TRUE
      );
      $this->load->library('email', $config);
      $isi = "
         <html>
            <body>
               <h2>Persuratan Masuk Group</h2>
               <table>
                     <tr><td>Dari</td>                  <td>:</td> <td><b>$dari</b></td></tr>
                     <tr><td>Agenda</td>                <td>:</td> <td><b>$agenda</b></td></tr>
                     <tr><td>Do Date</td>               <td>:</td> <td><b>$dodate</b></td> </tr>
                     <tr><td>Catatan Group Head </td>   <td>:</td> <td><b>$disposisi</b></td> </tr>
                     <tr><td>Detail Surat</td>          <td>:</td> <td><b>$link</b></td> </tr>
                     <tr><td>Download Document</td>     <td>:</td> <td><b>$document</b></td> </tr>
               </table>
               <h4>Do Not Reply To This Email</h4>
            </body>
         </html>";
         $this->email->from('test@mandiri.co.id');
         $this->email->reply_to('no-reply@bankmandiri.co.id', 'No-Reply');
         $this->email->to($send);
         $this->email->subject('Persuratan Masuk');
         $this->email->message($isi);
         $this->email->send();

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