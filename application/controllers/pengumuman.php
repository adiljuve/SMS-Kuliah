<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengumuman extends Controller {

	function Pengumuman()
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
		redirect ('admin');
	}
	
	function kirimPengumuman()
	{
		$kode_matakuliah = $this->uri->segment(3);
		if($kode_matakuliah==''){
			redirect ('admin');
		}else{
			$mahasiswa = $this->Sms_model->getMahasiswa($kode_matakuliah);
			if ($mahasiswa):
				foreach($mahasiswa as $mahasiswa_kirim):
					$no_tujuan = $mahasiswa_kirim->hp;
					$reply = "Diberitahukan kepada mahasiswa yang mengambil matakuliah ".$mahasiswa_kirim->matakuliah.", kelas ".$mahasiswa_kirim->kelas.", hari ".$mahasiswa_kirim->hari.", pukul ".$mahasiswa_kirim->waktu.", bahwa kuliah pada minggu ini dinyatakan KOSONG";
					if (strlen($reply) <= 160):
						$data = array(
							'CreatorID' => 'admin',
							'DestinationNumber' => $no_tujuan,
							'TextDecoded' => $reply
						);
					$this->Sms_model->makeOutbox($data);
					else:
						exec('c:\gammu\gammu-smsd-inject.exe -c c:\gammu\smsdrc EMS '.$no_tujuan.' -text "'.$reply.'"');
					endif;
				endforeach;
			endif;
			if(isset($_SERVER['HTTP_REFERER'])){
				redirect ($_SERVER['HTTP_REFERER']);
			}else{
				echo '<script>history.go(-1)</script>';
			}
		}
	}
}