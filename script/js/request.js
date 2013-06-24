function validasi_matakuliah(form){
		if (document.kuliah.jurusan.selectedIndex==0||(form.matakuliah.value=="")||(form.kelas.value=="")||document.kuliah.hari.selectedIndex==0||document.kuliah.semester.selectedIndex==0)
		{
			return false;
		}else{
			form.submit();
			return true;
		}
}

function validasi_dosen(form){
		if (document.dosen.jurusan.selectedIndex==0||(form.nama.value=="")||(form.hp.value=="")||(form.password.value==""))
		{
			return false;
		}else{
			form.submit();
			return true;
		}
}