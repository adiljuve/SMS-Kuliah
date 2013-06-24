<h2><?php echo $title;?> &raquo; Gateway</h2>
<div id="main">

<h3>Service Reply: </h3>
<fieldset>
<?php
$gammuexe = "C:\gammu\gammu.exe";
$gammurc = "C:\gammu\gammurc";
$gammusvc = "C:\gammu\gammu-smsd.exe";
$gammusmsdrc = "C:\gammu\smsdrc";

    if(isset($_POST['mati'])){
        exec("$gammusvc -k",$ret);
        echo "<p>" . $ret[0] ."</p>";
    }
    if(isset($_POST['hidup'])){
        exec("$gammusvc -c $gammusmsdrc -s",$ret);
        echo "<p>" . $ret[0] ."</p>";
    }
    if(isset($_POST['cekdevice'])){
        exec("$gammuexe -c $gammurc --identify",$ret);

		foreach ($ret as $value) {
		echo "<p>".$value."</p>";
		}        
    }
    if(isset($_POST['cekpulsa'])){
        $nodial=$_POST['nodial'];
        exec("$gammuexe -c $gammurc --getussd $nodial",$ret);
        /*echo $ret[1];
        echo "<p>" . $ret[0];
        echo $ret[2];
        echo $ret[3];
        echo $ret[4] . "</p>";*/
		foreach ($ret as $value) {
		echo "<p>".$value."</p>";
		}         
    }
?>
</fieldset>
<fieldset>
<form action="" method="post" class="jNice">
	<input type="hidden" name="mati" value="mati">
	<input type="submit" value="MATIKAN">
</form>
<form action="" method="post" class="jNice">
	<input type="hidden" name="hidup" value="hidup">
	<input type="submit" value="HIDUPKAN">
</form>
<form action="" method="post" class="jNice">
	<input type="hidden" name="cekdevice" value="cekdevice">
	<input type="submit" value="CEK DEVICE">
</form>
<br/><br/><br/>
<form action="" method="post" class="jNice">
	<input type="hidden" name="cekpulsa" value="cekpulsa">
	<input type="text" class="text-small" name="nodial" value="*888#">
	<input type="submit" value="CEK PULSA">
</form>
</fieldset>
</div>