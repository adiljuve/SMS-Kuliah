<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends Controller {

	function index()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('admin');
		$this->session->unset_userdata('logged_in_sms_kuliah');
		redirect(base_url());
	}
}

