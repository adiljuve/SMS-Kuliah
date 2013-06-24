                <h2><?php echo $title;?> &raquo; Edit Mahasiswa</h2>               
                <div id="main">	
					<script type="text/javascript">
						function s(o){o.value=o.value.replace(/([^a-zA-Z .])/g,"");}
						function n(o){o.value=o.value.replace(/([^0-9])/g,"");}
					</script>				
                	<form name="mahasiswa" action="" method="post" onSubmit="return validasi_mahasiswa(mahasiswa)" class="jNice">
					<h3>Edit Mahasiswa</h3>
                    	<fieldset>
							<?php foreach ($queryMahasiswa as $mahasiswa):?>
							<p><a href="<?php echo base_url().$class; ?>/mahasiswa/<?php echo $mahasiswa->kode_matakuliah; ?>" class="out">Kembali ke Daftar</a></p>
							<input type="hidden" name="id_mahasiswa" id="id_mahasiswa" value="<?php echo $mahasiswa->id_mahasiswa;?>"/>
							<input type="hidden" name="kode_matakuliah" id="kode_matakuliah" value="<?php echo $mahasiswa->kode_matakuliah; ?>"/>
							<p><label>NIM:</label><input type="text" class="text-long" name="nim" id="nim" value="<?php echo $mahasiswa->nim;?>" maxlength="8" onkeydown="n(this)" onkeyup="n(this)" onblur="n(this)" onclick="n(this)"/></p>
                        	<p><label>Nama:</label><input type="text" class="text-long" name="nama" id="nama" value="<?php echo $mahasiswa->nama;?>" onkeydown="s(this)" onkeyup="s(this)" onblur="s(this)" onclick="s(this)"/></p>
                        	<p><label>HP:</label><input type="text" class="text-long" name="hp" id="hp" value="<?php echo $mahasiswa->hp;?>" maxlength="14" onkeydown="n(this)" onkeyup="n(this)" onblur="n(this)" onclick="n(this)"/></p>
							<?php endforeach;?>
                            <input type="submit" value="Submit" /><input type="reset" value="Reset" />							
                        </fieldset>
                    </form>
                </div>