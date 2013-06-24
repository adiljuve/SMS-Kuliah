                <h2><?php echo $title;?> &raquo; Matakuliah</h2>
                
                <div id="main">                	
					<h3>Daftar Matakuliah</h3>
							<table cellpadding="0" cellspacing="0" class="display" id="example">
							<thead>
							<tr>
								<th>No.</th>
								<th>Kode</th>
								<th>Matakuliah</th>
								<th>Kelas</th>
								<th>Ruang</th>
								<th>Waktu</th>
								<th>Hari</th>
								<th>Semester</th>
								<th>Dosen</th>								
								<th class="action">Mahasiswa</th>
								<th class="action">Aksi</th>
							</tr>
							</thead>
							<tbody>
						<?php $no=1;if ($queryMatakuliah):?>
							<?php foreach ($queryMatakuliah as $matakuliah):?>
							<?php if($no%2>0){?>
							<tr>
							<?php }else{?>
							<tr class="odd">
							<?php } ?>
								<td><?php echo $no++;?></td>
								<td><?php echo $matakuliah->kode_matakuliah;?></td>
								<td><?php echo $matakuliah->matakuliah;?></td>
								<td><?php echo $matakuliah->kelas;?></td>
								<td><?php echo $matakuliah->ruang;?></td>
								<td><?php echo $matakuliah->waktu;?></td>
								<td><?php echo $matakuliah->hari;?></td>
								<td><?php echo $matakuliah->semester;?></td>								
                                <td><?php echo $matakuliah->nama_dosen;?></td>
								<td class="action"><?php echo $this->db->count_all('mahasiswa where kode_matakuliah="'.$matakuliah->kode_matakuliah.'"');?><a href="<?php echo base_url().$class;?>/mahasiswa/<?php echo $matakuliah->kode_matakuliah;?>" class="view">Tambah</a></td>
                                <td class="action"><a href="#" onClick="kirim('<?php echo base_url();?>pengumuman/kirimPengumuman/<?php echo $matakuliah->kode_matakuliah;?>')" class="message">Kirim</a> <a href="<?php echo base_url().$class;?>/editMatakuliah/<?php echo $matakuliah->kode_matakuliah;?>" class="edit">Edit</a> <a href="#" onClick="hapus('<?php echo base_url().$class; ?>/hapusMatakuliah/<?php echo $matakuliah->kode_matakuliah;?>')" class="delete">Hapus</a></td>								
                            </tr>
							<?php endforeach;?>
						<?php else: ?>
							<tr>
								<td colspan="11" align="center">
									Tidak ada data
								</td>
							</tr>
						<?php endif;?>
							</tbody>
							<tfoot>
							<tr>
								<th>No.</th>
								<th>Kode</th>
								<th>Matakuliah</th>
								<th>Kelas</th>
								<th>Ruang</th>
								<th>Waktu</th>
								<th>Hari</th>
								<th>Semester</th>
								<th>Dosen</th>								
								<th class="action">Mahasiswa</th>
								<th class="action">Aksi</th>
							</tr>
							</tfoot>							
                        </table>
						<p>&nbsp;</p>
					<script type="text/javascript">
						function s(o){o.value=o.value.replace(/([^a-zA-Z0-9 .])/g,"");}
						function n(o){o.value=o.value.toUpperCase().replace(/([^A-Z])/g,"");}
						function c(o){o.value=o.value.toUpperCase().replace(/([^A-Z0-9.-])/g,"");}
						function t(o){o.value=o.value.replace(/([^0-9:])/g,"");}
					</script>
					<form name="kuliah" action="" method="post" onSubmit="return validasi_matakuliah(kuliah)" class="jNice">
					<h3>Form Matakuliah</h3>
                    	<fieldset>
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
                            <p><label>Dosen:</label>
                            <select name="dosen" id="dosen">
								<option value="0" selected>-- Pilih Dosen --</option>
							<?php foreach ($queryDosen as $dosen):?>
                            	<option value="<?php echo $dosen->id_dosen;?>"><?php echo $dosen->nama_dosen;?></option>
							<?php endforeach;?>
                            </select>
                            </p>
                            <input type="submit" value="Submit" /><input type="reset" value="Reset" />
                        </fieldset>
                    </form>
                </div>