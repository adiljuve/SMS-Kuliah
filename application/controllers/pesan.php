<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesan extends Controller {

	function Pesan()
	{
		parent::Controller();
		$this->is_logged_in();
		$this->load->model('Sms_model');
		$this->load->plugin('tanggal');
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
		$data['title'] = 'Pesan';
		$data['navsection'] = 'index';//link style
		$data['subnavsection'] = 'pesan';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu';
		$data['content']= 'message';
		$this->load->view('template',$data);
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
			$tujuan = $this->input->post('no_tujuan');
			$pesan = $this->input->post('isi_pesan');
			$data = array(
					'DestinationNumber' => $tujuan,
					'TextDecoded' => trim($pesan),
					'CreatorID' => 'admin',
					);
			$this->Sms_model->kirim($data);
			redirect('pesan');
		endif;
	}

	function message()
	{
		$data['title'] = 'Pesan';
		$data['navsection'] = 'index';//link style
		$data['subnavsection'] = 'pesan';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu';
		$data['content']= 'message';
		$this->load->view('template',$data);
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
			$tujuan = $this->input->post('no_tujuan');
			$pesan = $this->input->post('isi_pesan');
			$data = array(
					'DestinationNumber' => $tujuan,
					'TextDecoded' => trim($pesan),
					'CreatorID' => 'admin',
					);
			$this->Sms_model->kirim($data);
			redirect('pesan/message');
		endif;
	}
	
	function inbox()
	{
		$data['title'] = 'Pesan';
		$data['navsection'] = 'index';//link style
		$data['subnavsection'] = 'inbox';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu';
		$data['queryInbox'] = $this->Sms_model->inbox();
		$data['content']= 'inbox';
		$this->load->view('template',$data);
	}
	
	function outbox()
	{
		$data['title'] = 'Pesan';
		$data['navsection'] = 'index';//link style
		$data['subnavsection'] = 'outbox';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu';
		$data['queryOutbox'] = $this->Sms_model->outbox();
		$data['content']= 'outbox';
		$this->load->view('template',$data);
	}
	
	function sentitems()
	{
		$data['title'] = 'Pesan';
		$data['navsection'] = 'index';//link style
		$data['subnavsection'] = 'sentitems';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu';
		$data['querySentitems'] = $this->Sms_model->sentitems();
		$data['content']= 'sentitems';
		$this->load->view('template',$data);
	}
	
	function hapusInbox(){		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
			$id = $this->input->post('hapus');
			$banyaknya = count($id);
			for ($i=0; $i<$banyaknya; $i++){
				$this->Sms_model->hapusInbox($id,$i);
			}
			redirect('pesan/inbox');
		endif;
	}
	
	function hapusOutbox(){		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
			$id = $this->input->post('hapus');
			$banyaknya = count($id);
			for ($i=0; $i<$banyaknya; $i++){
				$this->Sms_model->hapusOutbox($id,$i);
			}
			redirect('pesan/outbox');
		endif;
	}
	
	function hapusSentitems(){		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
			$id = $this->input->post('hapus');
			$banyaknya = count($id);
			for ($i=0; $i<$banyaknya; $i++){
				$this->Sms_model->hapusSentitems($id,$i);
			}
			redirect('pesan/sentitems');
		endif;
	}
	
}
