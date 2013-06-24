<h2><?php echo $title;?> &raquo; Service Status (Windows Only)</h2>
<div id="main">
	<?php
	// menjalankan command untuk mengenerate file service.log
	passthru("net start > service.log");

	// membuka file service.log
	$handle = fopen("service.log", "r");

	// status awal = 0 (dianggap servicenya tidak jalan)
	$status = 0;

	// proses pembacaan isi file
	while (!feof($handle))
	{
	   // baca baris demi baris isi file
	   $baristeks = fgets($handle);
	   if (substr_count($baristeks, 'Gammu SMSD Service (GammuSMSD)') > 0)
	   {
		 // jika ditemukan baris yang berisi substring 'Gammu SMSD Service (GammuSMSD)'
		 // statusnya berubah menjadi 1
		 $status = 1;
	   }
	}
	// menutup file
	fclose($handle);

	// jika status terakhir = 1, maka gammu service running
	if ($status == 1) echo "<p><font color=\"red\">Gammu service running...</font></p>";
	// jika status terakhir = 0, maka service gammu berhenti
	else if ($status == 0) echo "<p><font color=\"red\">Gammu service stopped</font></p>";

	?>
	<p>&nbsp;</p>
</div>