<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Controller {

	function Login()
	{
		parent::Controller();
		$this->load->model('Sms_model');
	}

	
	function index()
	{
		$data['title'] = 'Login Mahasiswa';
		$this->load->view('login_mahasiswa',$data);
		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
/* 			$username = $this->input->post('username');
			$pass = md5($this->input->post('pass'));
			$query = $this->Sms_model->login($username, $pass);	
			if ($query):
			$session = array(
					'username' => $username,
					'unique' => $query->user_id,
					'status' => 'admin',
					'logged_in_sms_kuliah' => true
					);
			$this->session->set_userdata($session);
			redirect('admin');
			else:
				echo "<script> window.alert('Username dan Password tidak cocok. Mohon ulangi kembali!!'); </script>";
			endif; */
		endif;
	}

}