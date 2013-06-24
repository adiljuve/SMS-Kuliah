                <h2><?php echo $title;?> &raquo; Edit Dosen</h2>
                
                <div id="main">          
					<script type="text/javascript">
						function s(o){o.value=o.value.replace(/([^a-zA-Z .])/g,"");}
						function f(o){o.value=o.value.toUpperCase().replace(/([^0-9A-Z])/g,"");}
						function n(o){o.value=o.value.replace(/([^0-9])/g,"");}
					</script>
                	<form name="dosen" action="" method="post" onSubmit="return validasi_dosen(dosen)" class="jNice">
					<h3>Form Dosen</h3>
                    	<fieldset>
							<?php foreach ($queryDosen as $dosen):?>
							<p><a href="<?php echo base_url().$class; ?>/dosen" class="out">Kembali ke Daftar</a></p>
                        	<p><label>Nama:</label><input type="text" class="text-long" name="nama" id="nama" value="<?php echo $dosen->nama_dosen;?>" onkeydown="s(this)" onkeyup="s(this)" onblur="s(this)" onclick="s(this)"/></p>
                        	<p><label>HP:</label><input type="text" class="text-long" name="hp" id="hp"value="<?php echo $dosen->hp;?>" maxlength="14" onkeydown="n(this)" onkeyup="n(this)" onblur="n(this)" onclick="n(this)"/></p> 
                        	<p><label>Pass:</label><input type="text" class="text-long" name="password" id="password" value="<?php echo $dosen->password;?>" maxlength="5" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></p> 
							<?php endforeach;?>
                            <input type="submit" value="Submit" /><input type="reset" value="Reset" />
                        </fieldset>
                    </form> 						
                </div>