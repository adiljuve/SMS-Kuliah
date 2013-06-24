<?php
	function tgl_indo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			$jam = substr($tgl,10,9);
			return $tanggal.' '.$bulan.' '.$tahun.''.$jam;		 
	}	

	function getBulan($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
			} 
		
	function hari(){
			date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
			$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
			$hari = date("w");
			$hari_ini = $seminggu[$hari];
			return $hari_ini;
	}
	
	function day($hari){
		if($hari=="Minggu"){
		 return "Sunday";
		}else if($hari=="Senin"){
		 return "Monday";
		}else if($hari=="Selasa"){
		 return "Tuesday";
		}else if($hari=="Rabu"){
		 return "Wednesday";
		}else if($hari=="Kamis"){
		 return "Thursday";
		}else if($hari=="Jumat"){
		 return "Friday";
		}else if($hari=="Sabtu"){
		 return "Saturday";
		}
	}

	function tgl_eng($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getMonth(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			$jam = substr($tgl,10,9);
			return $tanggal.' '.$bulan.' '.$tahun.''.$jam;		 
	}	

	function getMonth($bln){
				switch ($bln){
					case 1: 
						return "Jan";
						break;
					case 2:
						return "Feb";
						break;
					case 3:
						return "Mar";
						break;
					case 4:
						return "Apr";
						break;
					case 5:
						return "May";
						break;
					case 6:
						return "Jun";
						break;
					case 7:
						return "Jul";
						break;
					case 8:
						return "Aug";
						break;
					case 9:
						return "Sep";
						break;
					case 10:
						return "Oct";
						break;
					case 11:
						return "Nove";
						break;
					case 12:
						return "Dec";
						break;
				}
			} 
?>
