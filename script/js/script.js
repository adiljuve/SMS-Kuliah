function kirim(url){
	var linkref = url;
	if(confirm("Anda yakin ingin mengirim pesan kuliah kosong?")){
		window.location.href=linkref;
	}
}

function hapus(url){
	var linkref = url;
	if(confirm("Anda yakin ingin menghapus?")){
		window.location.href=linkref;
	}
}

function aktifkan(url){
	var linkref = url;
	if(confirm("Anda yakin ingin mengaktifkan?")){
		window.location.href=linkref;
	}
}

function cek(form){
		if ((form.no_tujuan.value=="")||(form.isi_pesan.value==""))
		{
			return false;
		}else{
			if(confirm("Pesan akan dikirim, lanjutkan?")){
			form.submit();
			return true;
			}else{
			return false;
			}
		}
}

function validasi_matakuliah(form){
		if ((form.matakuliah.value=="")||(form.kelas.value=="")||document.kuliah.hari.selectedIndex==0||document.kuliah.semester.selectedIndex==0||document.kuliah.dosen.selectedIndex==0)
		{
			document.kuliah.dosen.focus();
			return false;
		}else{
			form.submit();
			return true;
		}
}

function validasi_editmatakuliah(form){
		if ((form.matakuliah.value=="")||document.kuliah.hari.selectedIndex==0||document.kuliah.semester.selectedIndex==0||document.kuliah.dosen.selectedIndex==0)
		{
			document.kuliah.dosen.focus();
			return false;
		}else{
			form.submit();
			return true;
		}
}

function validasi_dosen(form){
		if ((form.nama.value=="")||(form.hp.value=="")||(form.password.value==""))
		{
			return false;
		}else{
			form.submit();
			return true;
		}
}

function validasi_mahasiswa(form){
		if ((form.nim.value=="")||(form.nama.value=="")||(form.hp.value==""))
		{
			return false;
		}else{
			form.submit();
			return true;
		}
}

function check_profil(form){
		if ((form.pass_lama.value == ""))
		{
			return false;
		}else{
			form.submit();
			return true;
		}
}

function check_password(form){
		if ((form.pass_lama.value == "") || (form.pass_baru.value == "") || (form.pass_baru_ulang.value == ""))
	   	{
			return false;		  
		} 
		else if ((form.pass_baru.value) != (form.pass_baru_ulang.value))
	   	{
			window.alert('Password baru tidak cocok!');
			return false;		  
		} 
		else
		{	   	   		 
			form.submit();
			return true;
		}
}

function logout(url){
var linkref = url;
	if(confirm("Anda yakin ingin keluar?")){
		window.location.href=linkref;
	}
}