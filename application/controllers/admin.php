<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Controller {

	function Admin()
	{
		parent::Controller();
		$this->is_logged_in();
		$this->load->model('Sms_model');
	}
	
	function is_logged_in() 
	{
		$is_logged_in = $this->session->userdata('logged_in_sms_kuliah');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			redirect(base_url());
		}
	}
	
	function index()
	{
		$data['title'] = 'Admin';
		$data['navsection'] = 'admin';
		$data['subnavsection'] = 'petunjuk';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu_admin';
		$data['content'] = 'petunjuk';		
		$this->load->view('template',$data);
	}
	
	function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('is_logged_in');
		redirect(base_url());
	}
	
	function petunjuk()
	{
		$data['title'] = 'Admin';
		$data['navsection'] = 'admin';
		$data['subnavsection'] = 'petunjuk';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu_admin';
		$data['content'] = 'petunjuk';		
		$this->load->view('template',$data);
	}

	function balasan()
	{
		$data['title'] = 'Admin';
		$data['navsection'] = 'admin';
		$data['subnavsection'] = 'balasan';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu_admin';
		$data['queryBalasan'] = $this->Sms_model->balasan();
		$data['content'] = 'balasan';		
		$this->load->view('template',$data);
	}
	
	function editBalasan()
	{
		$id = $this->uri->segment(3);
		$data['title'] = 'Admin';
		$data['navsection'] = 'admin';
		$data['subnavsection'] = 'balasan';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu_admin';
		$data['queryBalasan'] = $this->Sms_model->detailBalasan($id);
		$data['content'] = 'editBalasan';
		$this->load->view('template',$data);
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
			$data = array(
					'pesan' => $this->input->post('pesan')
					);
			$this->Sms_model->edit_balasan($this->input->post('id_balasan'),$data);		
			redirect('admin/balasan');
		endif;
	}
	
	function profil()
	{
		$id = $this->session->userdata('unique');
		$data['title'] = 'Admin';
		$data['navsection'] = 'admin';//link style
		$data['subnavsection'] = 'profil';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu_admin';
		$data['queryAdmin'] = $this->Sms_model->info_admin($id);
		$data['content'] = 'profil';
		$this->load->view('template',$data);
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
			$data = array(
				'username' => $this->input->post('username')
			);
			$this->Sms_model->update_admin($this->session->userdata('unique'),$data);
			echo "<script>window.alert('Perubahan Username Berhasil!');</script>";
			echo "<script>history.go(-1)</script>";
		endif;
	}
	
	function password()
	{
		$data['title'] = 'Admin';
		$data['navsection'] = 'admin';
		$data['subnavsection'] = 'password';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu_admin';
		$data['content'] = 'password';
		$this->load->view('template',$data);
		
		$id = $this->session->userdata('unique');
		$data['query']= $this->Sms_model->info_admin($id);
		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
			if ($data['query']):
				if ($data['query']->password != md5($this->input->post('pass_lama'))):
					echo "<script>window.alert('Password lama salah!');</script>";
				else:
				$data = array(
						'password' => md5($this->input->post('pass_baru')),
						);	
				$this->Sms_model->update_admin($this->session->userdata('unique'),$data);
				echo "<script>window.alert('Perubahan Password Berhasil!');</script>";
				endif;
			endif;
		endif;
	}
	
	function gateway()
	{
		$data['title'] = 'Admin';
		$data['navsection'] = 'admin';
		$data['subnavsection'] = 'gateway';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu_admin';
		$data['content'] = 'gateway';
		$this->load->view('template',$data);
	}
	
	function status()
	{
		$data['title'] = 'Admin';
		$data['navsection'] = 'admin';
		$data['subnavsection'] = 'status';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu_admin';
		$data['content'] = 'status';
		$this->load->view('template',$data);	
	}
	
	
}