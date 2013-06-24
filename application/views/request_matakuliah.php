                <h2><?php echo $title;?> &raquo; Minta Matakuliah</h2>
                
                <div id="main">                	
					<script type="text/javascript">
						function s(o){o.value=o.value.replace(/([^a-zA-Z0-9 .])/g,"");}
						function n(o){o.value=o.value.toUpperCase().replace(/([^A-Z])/g,"");}
						function c(o){o.value=o.value.toUpperCase().replace(/([^A-Z0-9.-])/g,"");}
						function t(o){o.value=o.value.replace(/([^0-9:])/g,"");}
					</script>
					<form name="kuliah" action="" method="post" onSubmit="return validasi_matakuliah(kuliah)" class="jNice">
					<h3>Form Matakuliah</h3>
                    	<fieldset>
							<p><font color="red"><b>Isi dengan lengkap form berikut ini</b></font></p>
							<p><label>Jurusan:</label>
								<select name="jurusan" id="jurusan">
									<option value="0" selected>-- Pilih Jurusan --</option>
									<?php
									if($queryJurusan){
										foreach($queryJurusan as $jurusan){
											echo '<option value="'.$jurusan->id_jurusan.'">'.$jurusan->jurusan.'</option>';
										}
									}
									?>
								</select>
							</p>
                        	<p><label>Nama:</label><input type="text" class="text-long" name="matakuliah" id="matakuliah" onkeydown="s(this)" onkeyup="s(this)" onblur="s(this)" onclick="s(this)"/></p>
                        	<p><label>Matakuliah:</label><input type="text" class="text-long" name="matakuliah" id="matakuliah" onkeydown="s(this)" onkeyup="s(this)" onblur="s(this)" onclick="s(this)"/></p>
                        	<p><label>Kelas:</label><input type="text" class="text-long" name="kelas" id="kelas" maxlength="1" onkeydown="n(this)" onkeyup="n(this)" onblur="n(this)" onclick="n(this)"/></p>
                        	<p><label>Ruang (CONTOH: 02.04):</label><input type="text" class="text-long" name="ruang" id="ruang" onkeydown="c(this)" onkeyup="c(this)" onblur="c(this)" onclick="c(this)"/></p>
							<p><label>Waktu (CONTOH: 07:00 - 09:00):</label><input title="waktu mulai" type="text" class="text-small" name="mulai" id="mulai" maxlength="5" onkeydown="t(this)" onkeyup="t(this)" onblur="t(this)" onclick="t(this)"/><input title="waktu selesai" type="text" class="text-small" name="selesai" id="selesai" maxlength="5" onkeydown="t(this)" onkeyup="t(this)" onblur="t(this)" onclick="t(this)"/></p>
							<p><label>Hari:</label>
								<select name="hari" id="hari">
									<option value="0" selected>-- Pilih Hari --</option>
									<option value="Senin">Senin</option>
									<option value="Selasa">Selasa</option>
									<option value="Rabu">Rabu</option>
									<option value="Kamis">Kamis</option>
									<option value="Jumat">Jumat</option>
									<option value="Sabtu">Sabtu</option>
									<option value="Minggu">Minggu</option>
								</select>
							</p>
                        	<p><label>Semester:</label>
								<select name="semester" id="semester">
									<option value="0" selected>-- Pilih Semester --</option>
									<option value="Ganjil">Ganjil</option>
									<option value="Genap">Genap</option>
								</select>
							</p>

                            <input type="submit" value="Submit" /><input type="reset" value="Reset" />
                        </fieldset>
                    </form>
                </div>