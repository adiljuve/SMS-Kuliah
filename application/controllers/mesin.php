<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); error_reporting(E_ALL ^ E_NOTICE);

class Mesin extends Controller {

	function Mesin()
	{
		parent::Controller();
		$this->is_logged_in();
		$this->load->model('Sms_model');
		$this->load->plugin('randomid');
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
		$jurusan = '525';
		$data['class'] = 'mesin';
		$data['title'] = 'Teknik Mesin';
		$data['navsection'] = 'mesin';//link style
		$data['subnavsection'] = 'matakuliah';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu_jurusan';
		$data['queryMatakuliah'] = $this->Sms_model->matakuliah($jurusan);
		$data['queryDosen'] = $this->Sms_model->dosen($jurusan);
		$data['content'] = 'matakuliah';
		$this->load->view('template',$data);
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
			$kode = $jurusan.getRandomString().$this->input->post('kelas');
			$matakuliah = $this->input->post('matakuliah');
			$kelas = $this->input->post('kelas');
			$ruang = $this->input->post('ruang');
			$waktu = $this->input->post('mulai')."-".$this->input->post('selesai');
			$hari = $this->input->post('hari');
			$semester = $this->input->post('semester');
			$dosen = $this->input->post('dosen');
			$check = $this->Sms_model->cekMatakuliah($kode);
			if ($check!=0):
				echo "<script>window.alert('Maaf, terdapat kesalahan pada sistem, mohon diulangi kembali.');</script>";
			else:
			$data = array(
					'kode_matakuliah' => $kode,
					'matakuliah' => trim($matakuliah),
					'kelas' => $kelas,
					'ruang' => $ruang,
					'waktu' => $waktu,
					'hari' =>$hari,
					'semester' =>$semester,
					'id_dosen' => $dosen,
					'id_jurusan' => $jurusan,
					);
			$this->Sms_model->tambahMatakuliah($data);
			redirect('mesin/matakuliah');
			endif;
		endif;
	}

	function matakuliah()
	{	
		$jurusan = '525';
		$data['class'] = 'mesin';
		$data['title'] = 'Teknik Mesin';
		$data['navsection'] = 'mesin';
		$data['subnavsection'] = 'matakuliah';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu_jurusan';
		$data['queryMatakuliah'] = $this->Sms_model->matakuliah($jurusan);
		$data['queryDosen'] = $this->Sms_model->dosen($jurusan);
		$data['content'] = 'matakuliah';
		$this->load->view('template',$data);
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
			$kode = $jurusan.getRandomString().$this->input->post('kelas');
			$matakuliah = $this->input->post('matakuliah');
			$kelas = $this->input->post('kelas');
			$ruang = $this->input->post('ruang');
			$waktu = $this->input->post('mulai')."-".$this->input->post('selesai');
			$hari = $this->input->post('hari');
			$semester = $this->input->post('semester');
			$dosen = $this->input->post('dosen');
			$check = $this->Sms_model->cekMatakuliah($kode);
			if ($check!=0):
				echo "<script>window.alert('Maaf, terdapat kesalahan pada sistem, mohon diulangi kembali.');</script>";
			else:
			$data = array(
					'kode_matakuliah' => $kode,
					'matakuliah' => trim($matakuliah),
					'kelas' => $kelas,
					'ruang' => $ruang,
					'waktu' => $waktu,
					'hari' =>$hari,
					'semester' =>$semester,
					'id_dosen' => $dosen,
					'id_jurusan' => $jurusan,
					);
			$this->Sms_model->tambahMatakuliah($data);
			redirect('mesin/matakuliah');
			endif;
		endif;
	}
	
	function mahasiswa()
	{
		$id = $this->uri->segment(3);
		$data['class'] = 'mesin';
		$data['title'] = 'Teknik Mesin';
		$data['navsection'] = 'mesin';
		$data['subnavsection'] = 'matakuliah';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu_jurusan';
		$data['queryMatakuliah'] = $this->Sms_model->detail($id);
		$data['queryMahasiswa'] = $this->Sms_model->mahasiswa($id);
		$data['content'] = 'mahasiswa';
		$this->load->view('template',$data);
		
 		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
			$nim = $this->input->post('nim');
			$nama = $this->input->post('nama');
			$hp = $this->input->post('hp');
			$kode_matakuliah = $this->input->post('kode_matakuliah');
			$data = array(
					'nim' => $nim,
					'nama' => trim($nama),
					'hp' => $hp,
					'kode_matakuliah' => $kode_matakuliah
					);
			$this->Sms_model->tambahMahasiswa($data);
			redirect('mesin/mahasiswa/'.$id);
		endif;
	}
	
	function dosen()
	{
		$jurusan = '525';
		$data['class'] = 'mesin';
		$data['title'] = 'Teknik Mesin';
		$data['navsection'] = 'mesin';
		$data['subnavsection'] = 'dosen';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu_jurusan';
		$data['queryDosen'] = $this->Sms_model->dosen($jurusan);
		$data['content'] = 'dosen';
		$this->load->view('template',$data);
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
			$nama = $this->input->post('nama');
			$hp = $this->input->post('hp');		
			$password = $this->input->post('password');	
			$check = $this->Sms_model->cekDosen($password);
			if ($check!=0):
				echo "<script>window.alert('Penambahan Gagal! sudah ada dosen dengan password yang sama');</script>";
			else:
			$data = array(
					'nama_dosen' => trim($nama),
					'hp' => $hp,
					'password' => $password,
					'jurusan' => $jurusan
					);
			$this->Sms_model->tambahDosen($data);		
			redirect('mesin/dosen');
			endif;
		endif;
	}
	
	function request()
	{
		$jurusan = '525';
		$data['class'] = 'mesin';
		$data['title'] = 'Teknik Mesin';
		$data['navsection'] = 'mesin';
		$data['subnavsection'] = 'request';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu_jurusan';
		$data['queryDosen'] = $this->Sms_model->daftar_request($jurusan);
		$data['content'] = 'daftar_request';
		$this->load->view('template',$data);
	}
	
	function tambahMatakuliah()
	{
		$jurusan = '525';
		$id = $this->uri->segment(3);
		$data['class'] = 'mesin';
		$data['title'] = 'Teknik Mesin';
		$data['navsection'] = 'mesin';
		$data['subnavsection'] = 'dosen';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu_jurusan';
		$data['queryDosen'] = $this->Sms_model->detail_dosen($id);
		$data['queryMatakuliah'] = $this->Sms_model->dosen_matakuliah($jurusan,$id);
		$data['content'] = 'tambahMatakuliah';
		$this->load->view('template',$data);
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
			$kode = $jurusan.getRandomString().$this->input->post('kelas');
			$matakuliah = $this->input->post('matakuliah');
			$kelas = $this->input->post('kelas');
			$ruang = $this->input->post('ruang');
			$waktu = $this->input->post('mulai')."-".$this->input->post('selesai');
			$hari = $this->input->post('hari');
			$semester = $this->input->post('semester');
			$dosen = $this->input->post('dosen');
			$check = $this->Sms_model->cekMatakuliah($kode);
			if ($check!=0):
				echo "<script>window.alert('Maaf, terdapat kesalahan pada sistem, mohon diulangi kembali.');</script>";
			else:
			$data = array(
					'kode_matakuliah' => $kode,
					'matakuliah' => trim($matakuliah),
					'kelas' => $kelas,
					'ruang' => $ruang,
					'waktu' => $waktu,
					'hari' =>$hari,
					'semester' =>$semester,
					'id_dosen' => $dosen,
					'id_jurusan' => $jurusan,
					);
			$this->Sms_model->tambahMatakuliah($data);
			redirect('mesin/tambahMatakuliah/'.$id);
			endif;
		endif;
	}
	
	function editMatakuliah()
	{
		$jurusan = '525';
		$id = $this->uri->segment(3);
		$data['class'] = 'mesin';
		$data['title'] = 'Teknik Mesin';
		$data['navsection'] = 'mesin';
		$data['subnavsection'] = 'matakuliah';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu_jurusan';
		$data['queryDosen'] = $this->Sms_model->dosen($jurusan);
		$data['queryMatakuliah'] = $this->Sms_model->detailMatakuliah($id);
		$data['content'] = 'editMatakuliah';
		$this->load->view('template',$data);
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
			$data = array(
					'matakuliah' => trim($this->input->post('matakuliah')),
					'ruang' => trim($this->input->post('ruang')),
					'waktu' => $this->input->post('mulai')."-".$this->input->post('selesai'),
					'hari' => $this->input->post('hari'),
					'semester' => $this->input->post('semester'),
					'id_dosen' => $this->input->post('dosen')
					);
			$this->Sms_model->edit_matakuliah($this->input->post('kode_matakuliah'),$data);		
			redirect('mesin/matakuliah');
		endif;
	}
	
	function editMatakuliahDosen()
	{
		$jurusan = '525';
		$id = $this->uri->segment(3);
		$data['class'] = 'mesin';
		$data['title'] = 'Teknik Mesin';
		$data['navsection'] = 'mesin';
		$data['subnavsection'] = 'dosen';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu_jurusan';
		$data['queryDosen'] = $this->Sms_model->dosen($jurusan);
		$data['queryMatakuliah'] = $this->Sms_model->detailMatakuliah($id);
		$data['content'] = 'editMatakuliahDosen';
		$this->load->view('template',$data);
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
			$data = array(
					'matakuliah' => trim($this->input->post('matakuliah')),
					'ruang' => trim($this->input->post('ruang')),
					'waktu' => $this->input->post('mulai')."-".$this->input->post('selesai'),
					'hari' => $this->input->post('hari'),
					'semester' => $this->input->post('semester'),
					'id_dosen' => $this->input->post('dosen')
					);
			$this->Sms_model->edit_matakuliah($this->input->post('kode_matakuliah'),$data);		
			redirect('mesin/tambahMatakuliah/'.$this->input->post('dosen'));
		endif;
	}
	
	function editMahasiswa()
	{
		$jurusan = '525';
		$id = $this->uri->segment(3);
		$data['class'] = 'mesin';
		$data['title'] = 'Teknik Mesin';
		$data['navsection'] = 'mesin';
		$data['subnavsection'] = 'matakuliah';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu_jurusan';
		$data['queryMahasiswa'] = $this->Sms_model->detailMahasiswa($id);
		$data['content'] = 'editMahasiswa';
		$this->load->view('template',$data);
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
			$data = array(
					'nim' => $this->input->post('nim'),
					'nama' => trim($this->input->post('nama')),
					'hp' => $this->input->post('hp')
					);
			$this->Sms_model->edit_mahasiswa($id,$data);
			redirect('mesin/mahasiswa/'.$this->input->post('kode_matakuliah'));
		endif;	
	}
	
	function editDosen()
	{
		$jurusan = '525';
		$id = $this->uri->segment(3);
		$data['class'] = 'mesin';
		$data['title'] = 'Teknik Mesin';
		$data['navsection'] = 'mesin';
		$data['subnavsection'] = 'dosen';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu_jurusan';
		$data['queryDosen'] = $this->Sms_model->detailDosen($id);
		$data['content'] = 'editDosen';
		$this->load->view('template',$data);
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
			$data = array(
					'nama_dosen' => trim($this->input->post('nama')),
					'hp' => $this->input->post('hp'),
					'password' => $this->input->post('password')
					);
			$this->Sms_model->edit_dosen($id,$data);
			redirect('mesin/dosen');
		endif;
	}
	
	function editRequest()
	{
		$jurusan = '525';
		$id = $this->uri->segment(3);
		$data['class'] = 'mesin';
		$data['title'] = 'Teknik Mesin';
		$data['navsection'] = 'mesin';
		$data['subnavsection'] = 'request';
		$data['menu'] = 'menu';
		$data['submenu'] = 'submenu_jurusan';
		$data['queryDosen'] = $this->Sms_model->detailRequest($id);
		$data['content'] = 'edit_request';
		$this->load->view('template',$data);
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
			$data = array(
					'nama_dosen' => trim($this->input->post('nama')),
					'hp' => $this->input->post('hp'),
					'password' => $this->input->post('password')
					);
			$this->Sms_model->edit_request($id,$data);
			redirect('mesin/request');
		endif;
	}
	
	function hapusMatakuliah()
	{
		$id = $this->uri->segment(3);
		if($id==''){
			redirect ('mesin/matakuliah');
		}else{
			$this->Sms_model->hapusMatakuliah($id);
			$this->Sms_model->hapusMahasiswaMatakuliah();
			redirect ($_SERVER['HTTP_REFERER']);
		}
	}
	
	function hapusMahasiswa()
	{
		$id = $this->uri->segment(3);
		if($id==''){
			redirect ('mesin/matakuliah');
		}else{
			$this->Sms_model->hapusMahasiswa($id);
			redirect ($_SERVER['HTTP_REFERER']);
		}
	}
	
	function hapusDosen()
	{
		$id = $this->uri->segment(3);
		if($id==''){
			redirect ('mesin/dosen');
		}else{
			$this->Sms_model->hapusDosen($id);
			$this->Sms_model->hapusMatakuliahDosen($id);
			$this->Sms_model->hapusMahasiswaDosen();
			redirect ($_SERVER['HTTP_REFERER']);
		}
	}
	
	function confirmRequest()
	{
		$id = $this->uri->segment(3);
		if($id==''){
			redirect ('mesin/request');
		}else{
			$password = $this->Sms_model->passRequest($id);
			if($password){
			$check = $this->Sms_model->cekDosen($password->password);
				if ($check!=0){
					echo "<script>window.alert('Penambahan Gagal! sudah ada dosen dengan password yang sama');</script><meta http-equiv=refresh content=0;url='".base_url()."mesin/request'>";
				}else{
					$akun = $this->Sms_model->kirimAkun($id);
					if ($akun){
						foreach ($akun as $target):
							$no_tujuan = $target->hp;
							$baca = $this->Sms_model->getBalasan("AKTIFKAN");
							if ($baca){
								foreach ($baca as $kirim):
									$find = array("[nama]","[hp]","[pass]");
									$replace = array($target->nama_dosen,$target->hp,$target->password);	
									$reply = str_replace($find,$replace,$kirim->pesan);
								endforeach;
							}
						endforeach;
						if (strlen($reply) <= 160){
							$data = array(
								'CreatorID' => 'system',
								'DestinationNumber' => $no_tujuan,
								'TextDecoded' => $reply
							);
							$this->Sms_model->makeOutbox($data);
						}else{
							exec('c:\gammu\gammu-smsd-inject.exe -c c:\gammu\smsdrc EMS '.$no_tujuan.' -text "'.$reply.'"');
						}
					}
					$this->Sms_model->confirmRequest($id);
					$this->Sms_model->hapusRequest($id);
					redirect ('mesin/request');
				}
			}
		}
	}
	
}