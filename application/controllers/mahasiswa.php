<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends Controller {

	function Mahasiswa()
	{
		parent::Controller();
		$this->load->model('Sms_model');
		$this->load->plugin('randomid');
	}
	
	function index()
	{
 		$data['title'] = 'SMS Kuliah';
		$data['navsection'] = 'mahasiswa';
		$data['subnavsection'] = '';
		$data['menu'] = 'mahasiswa_menu';
		$data['submenu'] = 'mahasiswa_submenu';
		$data['content'] = 'mahasiswa_content';
		$this->load->view('mahasiswa_template',$data);
	}

	function hp()
	{
		$data['title'] = 'SMS Kuliah';
		$data['navsection'] = 'informatika';
		$data['subnavsection'] = 'hp';
		$data['menu'] = 'mahasiswa_menu';
		$data['submenu'] = 'mahasiswa_submenu';
		$data['content'] = 'mahasiswa_hp';
		$this->load->view('mahasiswa_template',$data);
	}
	
	function matakuliah()
	{
		$data['title'] = 'SMS Kuliah';
		$data['navsection'] = 'informatika';
		$data['subnavsection'] = 'matakuliah';
		$data['menu'] = 'mahasiswa_menu';
		$data['submenu'] = 'mahasiswa_submenu';
		$data['content'] = 'mahasiswa_matakuliah';
		$this->load->view('mahasiswa_template',$data);
	}
	
}