                <h2><?php echo $title;?> &raquo; Edit Matakuliah</h2>
                
                <div id="main">
					<script type="text/javascript">
						function s(o){o.value=o.value.replace(/([^a-zA-Z0-9 .])/g,"");}
						function c(o){o.value=o.value.toUpperCase().replace(/([^A-Z0-9.-])/g,"");}
						function t(o){o.value=o.value.replace(/([^0-9:])/g,"");}
					</script>
                	<form name="kuliah" action="" method="post" onSubmit="return validasi_editmatakuliah(kuliah)" class="jNice">
					<h3>Form Matakuliah</h3>
                    	<fieldset>	
							<?php foreach ($queryMatakuliah as $matakuliah):?>
							<p><a href="<?php echo base_url().$class; ?>/tambahMatakuliah/<?php echo $matakuliah->id_dosen; ?>" class="out">Kembali ke Daftar</a></p>
							<input type="hidden" name="kode_matakuliah" id="kode_matakuliah" value="<?php echo $matakuliah->kode_matakuliah;?>"/>
                        	<p><label>Matakuliah:</label><input type="text" class="text-long" name="matakuliah" id="matakuliah" value="<?php echo $matakuliah->matakuliah;?>" onkeydown="s(this)" onkeyup="s(this)" onblur="s(this)" onclick="s(this)"/></p>
							<p><label>Ruang (CONTOH: 02.04):</label><input type="text" class="text-long" name="ruang" id="ruang" value="<?php echo $matakuliah->ruang;?>" onkeydown="c(this)" onkeyup="c(this)" onblur="c(this)" onclick="c(this)"/></p>
							<?php 
							$waktu = explode("-", $matakuliah->waktu);
							?>
							<p><label>Waktu (CONTOH: 07:00 - 09:00):</label><input title="waktu mulai" type="text" class="text-small" name="mulai" id="mulai" maxlength="5" value="<?php echo $waktu[0]; ?>" onkeydown="t(this)" onkeyup="t(this)" onblur="t(this)" onclick="t(this)"/><input title="waktu selesai" type="text" class="text-small" name="selesai" id="selesai" maxlength="5" value="<?php echo $waktu[1]; ?>" onkeydown="t(this)" onkeyup="t(this)" onblur="t(this)" onclick="t(this)"/></p>
							<p><label>Hari:</label>
							<select name="hari" id="hari">
								<option value="0" selected>-- Pilih Hari --</option>
								<option value="Senin" <?php echo ($matakuliah->hari == 'Senin') ? 'selected' : ''; ?>>Senin</option>
								<option value="Selasa" <?php echo ($matakuliah->hari == 'Selasa') ? 'selected' : ''; ?>>Selasa</option>
								<option value="Rabu" <?php echo ($matakuliah->hari == 'Rabu') ? 'selected' : ''; ?>>Rabu</option>
								<option value="Kamis" <?php echo ($matakuliah->hari == 'Kamis') ? 'selected' : ''; ?>>Kamis</option>
								<option value="Jumat" <?php echo ($matakuliah->hari == 'Jumat') ? 'selected' : ''; ?>>Jumat</option>
								<option value="Sabtu"<?php echo ($matakuliah->hari == 'Sabtu') ? 'selected' : ''; ?>>Sabtu</option>
								<option value="Minggu" <?php echo ($matakuliah->hari == 'Minggu') ? 'selected' : ''; ?>>Minggu</option>
							</select>				
							</p>
							<p><label>Semester:</label>
							<select name="semester" id="semester">
								<option value="0" selected>-- Pilih Semester --</option>
								<option value="Ganjil" <?php echo ($matakuliah->semester == 'Ganjil') ? 'selected' : ''; ?>>Ganjil</option>
								<option value="Genap" <?php echo ($matakuliah->semester == 'Genap') ? 'selected' : ''; ?>>Genap</option>
							</select>
							</p>
							<?php endforeach;?>
                            <p><label>Dosen:</label>
                            <select name="dosen" id="dosen">
								<option value="0" selected>-- Pilih Dosen --</option>
							<?php foreach ($queryDosen as $dosen):?>
                            	<option value="<?php echo $dosen->id_dosen;?>"<?php if ($dosen->id_dosen == $matakuliah->id_dosen):?> selected<?php else:?><?php endif;?>><?php echo $dosen->nama_dosen;?></option>
							<?php endforeach;?>
                            </select>
                            </p>
                            <input type="submit" value="Submit" /><input type="reset" value="Reset" />
                        </fieldset>
                    </form>
                </div>
                <!-- // #main -->