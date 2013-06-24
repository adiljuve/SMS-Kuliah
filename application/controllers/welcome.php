<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();
		$this->is_logged_in();
		$this->load->model('Sms_model');
	}
	
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('logged_in_sms_kuliah');
		if (!isset($is_logged_in) || $is_logged_in == true)
		{
			redirect('admin');
		}
	}
	
	function index()
	{
		$data['title'] = 'Login Panel';
		$this->load->view('welcome_login',$data);
		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
			$username = $this->input->post('username');
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
			endif;
		endif;
	}

}