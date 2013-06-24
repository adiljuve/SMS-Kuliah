                <h2><?php echo $title;?> &raquo; Daftar Akun</h2>
                
                <div id="main">                	
					<script type="text/javascript">
						function s(o){o.value=o.value.replace(/([^a-zA-Z .])/g,"");}
						function f(o){o.value=o.value.toUpperCase().replace(/([^0-9A-Z])/g,"");}
						function n(o){o.value=o.value.replace(/([^0-9])/g,"");}
					</script>
                	<form name="dosen" action="<?php echo base_url();?>request/mendaftar" method="post" onSubmit="return validasi_dosen(dosen)" class="jNice">
					<h3>Form Akun Dosen</h3>
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
                        	<p><label>Nama:</label><input type="text" class="text-long" name="nama" id="nama" onkeydown="s(this)" onkeyup="s(this)" onblur="s(this)" onclick="s(this)"/></p>
                        	<p><label>HP:</label><input type="text" class="text-long" name="hp" id="hp" maxlength="14" onkeydown="n(this)" onkeyup="n(this)" onblur="n(this)" onclick="n(this)"/></p>
                        	<p><label>Pass (Huruf Kapital dan Angka):</label><input type="text" class="text-long" name="password" id="password" maxlength="5" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></p>
							<input type="submit" value="Submit" /><input type="reset" value="Reset" />
                        </fieldset>
                    </form> 						
                </div>