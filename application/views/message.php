<script type="text/javascript">
function Count(){
	var karakter,maksimum;  
	maksimum = 160
	karakter = maksimum-(document.pesan.isi_pesan.value.length);  
	if (karakter < 0) {
		//alert("Jumlah Maksimum Karakter:  " + maksimum + "");  
		document.pesan.isi_pesan.value = document.pesan.isi_pesan.value.substring(0,maksimum);  
		karakter = maksimum-(document.pesan.isi_pesan.value.length);  
		document.pesan.counter.value = karakter;  
	} 
	else {
		document.pesan.counter.value =  maksimum-(document.pesan.isi_pesan.value.length);
	}
}
function n(o){o.value=o.value.replace(/([^0-9])/g,"");}
</script> 
<h2><?php echo $title;?> &raquo; Kirim Pesan</h2>
                <div id="main">                	
					<form name="pesan" action="" method="post" onSubmit="return cek(pesan)" class="jNice">
					<h3>Form Kirim Pesan</h3>
                    	<fieldset>
                        	<p><label>Nomor Tujuan:</label><input type="text" class="text-long" name="no_tujuan" id="no_tujuan" maxlength="14" onkeydown="n(this)" onkeyup="n(this)" onblur="n(this)" onclick="n(this)"/></p>
                        	<p><label>Isi Pesan:</label><textarea name="isi_pesan" rows="1" cols="1" OnFocus="Count();" OnClick="Count();" onKeydown="Count();" OnChange="Count();" onKeyup="Count();"></textarea></p>
							<p><input name="counter" type="text" class="text-small" value="160" disabled/></p>
                            <input type="submit" value="Kirim Pesan" /><input type="reset" value="Reset" />
                        </fieldset>
                    </form> 						
                </div>