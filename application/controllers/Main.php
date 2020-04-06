<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index(){
		$this->load->view('form');
	}

	public function send(){
		$this->load->library('mailer');
		// $email_penerima = $this->input->post('email_penerima');
		$email_penerima = 'achyasir27rofiqi@gmail.com';

		// $subjek = $this->input->post('subjek');
		$subjek = 'Pesan dari SMTP';

		// $pesan = $this->input->post('pesan');
		$pesan = 'Ini isi pesannya pak ('.date('Y-m-d H:i:s'.')');
		// $attachment = $_FILES['attachment'];
		$attachment = array();
		// $content = $this->load->view('content', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
		$sendmail = array(
				'email_penerima'=>$email_penerima,
				'subjek'=>$subjek,
				'content'=>$pesan
			);
		if(empty($attachment['name'])){ // Jika tanpa attachment
				$send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
		}else{ // Jika dengan attachment
				$send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
		}
		echo "<b>".$send['status']."</b><br />";
		echo $send['message'];
		echo "<br /><a href='".base_url()."'>Kembali ke Form</a>";
	}

}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */