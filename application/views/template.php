<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SMS Kuliah | <?php echo $title;?></title>

<!-- Template -->
<link href="<?php echo base_url();?>style/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo base_url();?>style/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/js/jNice.js"></script>
<!-- System -->
<script type="text/javascript" src="<?php echo base_url(); ?>script/js/script.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>script/js/checkbox.js"></script>
<style type="text/css" title="currentStyle">
	@import "<?php echo base_url();?>datatables/css/demo_table.css";
</style>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>datatables/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>datatables/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').dataTable( {
					"sPaginationType": "full_numbers",
					"aoColumnDefs": [
						{ "bSortable": false, "aTargets": [ 0 ] }
					],
					<?php
					if ($title=='Pesan')
					{?>
					"aaSorting": [[ 1, 'desc' ]]
					<?php
					}
					?>
				} );
	} );
	var autoreply_url = "<?php echo base_url();?>autoreply";
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>script/js/autoreply.js"></script>

</head>

<body onload="ajax()">
	<div id="wrapper">
    	<h1><a href="<?php echo base_url();?>info" onclick="$(this).modal({width:388, height:453}).open(); return false;"><span>SMS Kuliah</span></a></h1>      
			<?php $this->load->view($menu);?>
        <noscript><p align="center"><b><font color="red"><blink>javascript tidak terdeteksi, dan aplikasi tidak akan berjalan dengan lancar. silakan aktifkan javascript pada browser Anda<blink></font></b></p></noscript>
        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
					<?php $this->load->view($submenu);?>        
                </div>    
					<?php $this->load->view($content);?>
                <div class="clear"></div>
            </div>
        </div>	
        <p id="footer"><a href="http://seip.informatics.uii.ac.id" target="_blank">Student Entrepreneur and Internship Program</a> Teknik Informatika <a href="http://uii.ac.id" target="_blank">Universitas Islam Indonesia</a> &copy; 2011. Better viewed with Mozilla Firefox on 1024x768 screen resolution.</p>
    </div>

<script type="text/javascript" src="<?php echo base_url(); ?>script/js/modal-window.js"></script>
</body>
</html>
