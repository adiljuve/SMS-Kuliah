<?php
class Sms_model extends Model
{
	function Sms_model()
	{
		parent::Model();
	}
	
	function login($username, $pass)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $pass);
		return $this->db->get('user')->row();
	}
	
	function matakuliah($jurusan)
	{
		$this->db->select('*');
		$this->db->from('matakuliah');
		$this->db->where('id_jurusan',$jurusan);
		$this->db->join('dosen', 'dosen.id_dosen = matakuliah.id_dosen');
		return $this->db->get()->result();		
	}
	
	function detailMatakuliah($kode)
	{
		$this->db->select('*');
		$this->db->from('matakuliah');
		$this->db->where('kode_matakuliah',$kode);
		$this->db->join('dosen', 'dosen.id_dosen = matakuliah.id_dosen');
		return $this->db->get()->result();		
	}

	function cekMatakuliah($kode_matakuliah)
	{
		$this->db->select('*');
		$this->db->from('matakuliah');
		$this->db->where('kode_matakuliah',$kode_matakuliah);
		return $this->db->get()->num_rows();
	}
	
	function detailDosen($id)
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->where('id_dosen',$id);
		return $this->db->get()->result();
	}
	
	function detailMahasiswa($id)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where('id_mahasiswa',$id);
		return $this->db->get()->result();
	}
	
	function detail_dosen($id)
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->where('id_dosen',$id);
		//$this->db->join('dosen', 'dosen.id_dosen = matakuliah.id_dosen');
		return $this->db->get()->result();
	}
	
	function dosen_matakuliah($jurusan,$id)
	{
		$this->db->select('*');
		$this->db->from('matakuliah');
		$this->db->where('id_jurusan',$jurusan);
		$this->db->where('id_dosen',$id);
		//$this->db->join('dosen', 'dosen.id_dosen = matakuliah.id_dosen');
		return $this->db->get()->result();		
	}
	
	function cekDosen($pass)
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->where('password',$pass);
		return $this->db->get()->num_rows();
	}
	
	function detail($kode)
	{
		$this->db->select('*');
		$this->db->from('matakuliah');
		$this->db->where('kode_matakuliah',$kode);
		$this->db->join('dosen', 'dosen.id_dosen = matakuliah.id_dosen');
		return $this->db->get()->result();
	}
	
	function mahasiswa($kode)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where('mahasiswa.kode_matakuliah',$kode);
		$this->db->join('matakuliah', 'matakuliah.kode_matakuliah = mahasiswa.kode_matakuliah');
		return $this->db->get()->result();	
	}
	
	function dosen($jurusan)
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->where('jurusan',$jurusan);
		return $this->db->get()->result();
	}	
	
	function daftar_request($jurusan)
	{
		$this->db->select('*');
		$this->db->from('request_dosen');
		$this->db->where('jurusan',$jurusan);
		return $this->db->get()->result();
	}
	
	function detailRequest($id)
	{
		$this->db->select('*');
		$this->db->from('request_dosen');
		$this->db->where('id_dosen',$id);
		return $this->db->get()->result();
	}
	
	function passRequest($id)
	{
		$this->db->select('password');
		$this->db->from('request_dosen');
		$this->db->where('id_dosen',$id);
		return $this->db->get()->row();
	}
	
	/*************T A M B A H************/
	
	function tambahMatakuliah($data)
	{
		$this->db->insert('matakuliah',$data);
	}
	
	function tambahDosen($data)
	{
		$this->db->insert('dosen',$data);
	}
	
	function tambahMahasiswa($data)
	{
		$this->db->insert('mahasiswa',$data);
	}
	
	/*************E D I T************/
	
	function edit_matakuliah($kode_matakuliah,$data)
	{
		$this->db->where('kode_matakuliah',$kode_matakuliah);
		$this->db->update('matakuliah',$data);
	}
	
	function edit_dosen($id_dosen,$data)
	{
		$this->db->where('id_dosen',$id_dosen);
		$this->db->update('dosen',$data);
	}
	
	function edit_mahasiswa($id_mahasiswa,$data)
	{
		$this->db->where('id_mahasiswa',$id_mahasiswa);
		$this->db->update('mahasiswa',$data);
	}
	
	function edit_request($id_dosen,$data)
	{
		$this->db->where('id_dosen',$id_dosen);
		$this->db->update('request_dosen',$data);
	}
	
	/*************H A P U S************/
	function hapusMatakuliah($kode_matakuliah)
	{
		$this->db->where('kode_matakuliah', $kode_matakuliah);
		$this->db->delete('matakuliah');
	}

	function hapusMahasiswaMatakuliah()
	{
		$this->db->query('DELETE FROM mahasiswa WHERE kode_matakuliah NOT IN (SELECT kode_matakuliah FROM matakuliah)');
		return;
	}	
	
	function hapusDosen($id_dosen)
	{
		$this->db->where('id_dosen', $id_dosen);
		$this->db->delete('dosen');
	}
		
	function hapusMatakuliahDosen($id_dosen)
	{
		$this->db->where('id_dosen', $id_dosen);
		$this->db->delete('matakuliah');
	}

	function hapusMahasiswaDosen()
	{
		$this->db->query('DELETE FROM mahasiswa WHERE kode_matakuliah NOT IN (SELECT kode_matakuliah FROM matakuliah)');
		return;
	}
	function hapusMahasiswa($id_mahasiswa)
	{
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		$this->db->delete('mahasiswa');
	}
	
	function confirmRequest($id_dosen)
	{
		$this->db->query('insert into dosen(nama_dosen,hp,password,jurusan) select nama_dosen,hp,password,jurusan from request_dosen where id_dosen = '.$id_dosen.'');
		return;
	}
	
	function hapusRequest($id_dosen)
	{
		$this->db->where('id_dosen', $id_dosen);
		$this->db->delete('request_dosen');
	}
	
	/******************P E S A N*****************/
	function inbox()
	{
		$this->db->select('*');
		$this->db->order_by('ID','desc');
		$this->db->from('inbox');
		return $this->db->get()->result();
	}
	
	function outbox()
	{
		$this->db->select('*');
		$this->db->order_by('ID','desc');
		$this->db->from('outbox');
		return $this->db->get()->result();
	}	
	
	function sentitems()
	{
		$this->db->select('*');
		$this->db->order_by('ID','desc');
		$this->db->from('sentitems');
		return $this->db->get()->result();
	}
	
	function hapusInbox($id,$i)
	{
		$this->db->where('ID', $id[$i]);
		$this->db->delete('inbox');
	}

	function hapusOutbox($id,$i)
	{
		$this->db->where('ID', $id[$i]);
		$this->db->delete('outbox');
	}
	
	function hapusSentitems($id,$i)
	{
		$this->db->where('ID', $id[$i]);
		$this->db->delete('sentitems');
	}
	
	function kirim($data)
	{
		$this->db->insert('outbox',$data);
	}
	
	function info_admin($id)
	{
		$this->db->where('user_id',$id);
		$this->db->from('user');
		return $this->db->get()->row();
	}
	
	function update_admin($id, $data)
	{
		$this->db->where('user_id',$id);
		$this->db->update('user', $data);
		return;
	}
	
	/**************************A U T O R E P L Y*********************/
	function getInbox()
	{
		$this->db->select('*');
		$this->db->from('inbox');
		$this->db->where('Processed','false');
		return $this->db->get()->row();
	}
	
	function getPass($pass)//dosen
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->where('password',$pass);
		return $this->db->get()->result();
	}
	
	function jadwal($id_dosen)
	{
		$this->db->select('*');
		$this->db->from('matakuliah');
		$this->db->where('id_dosen',$id_dosen);
		return $this->db->get()->result();	
	}
	
	function getKuliah($kode)
	{
		$this->db->select('*');
		$this->db->from('matakuliah');
		$this->db->where('kode_matakuliah',$kode);
		return $this->db->get()->result();
	}
	
	function getMahasiswa($kode_matakuliah)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where('mahasiswa.kode_matakuliah',$kode_matakuliah);
		$this->db->join('matakuliah', 'matakuliah.kode_matakuliah = mahasiswa.kode_matakuliah');
		return $this->db->get()->result();
	}
	
	function updateInbox($id, $data)
	{
		$this->db->where('ID',$id);
		$this->db->update('inbox',$data);	
	}
	
	function makeOutbox($data)
	{
		$this->db->insert('outbox',$data);
	}
	
	function makeOutboxNotification($data)
	{
		$this->db->insert('outbox',$data);
	}
	
	function balasan()
	{
		$this->db->select('*');
		$this->db->from('reply');
		return $this->db->get()->result();
	}
	
	function detailBalasan($id)
	{
		$this->db->select('*');
		$this->db->from('reply');
		$this->db->where('id',$id);
		return $this->db->get()->result();
	}
	
	function edit_balasan($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('reply',$data);
	}

	function getBalasan($keyword)
	{
		$this->db->select('pesan');
		$this->db->from('reply');
		$this->db->where('keyword',$keyword);
		return $this->db->get()->result();
	}
	
	function jurusan()
	{
		$this->db->select('*');
		$this->db->from('jurusan');
		return $this->db->get()->result();
	}
	
	function requestDosen($data)
	{
		$this->db->insert('request_dosen',$data);
	}
	
	function kirimAkun($id)
	{
		$this->db->select('*');
		$this->db->from('request_dosen');
		$this->db->where('id_dosen',$id);
		return $this->db->get()->result();
	}
	
}