                <h2><?php echo $title;?> &raquo; Tambah Mahasiswa &raquo; <?php foreach ($queryMatakuliah as $kuliah):?><?php echo $kuliah->matakuliah;?> (Kelas <?php echo $kuliah->kelas;?>)<?php endforeach;?></h2>               
                <div id="main">				
					<h3>Daftar Mahasiswa</h3>							
					<table cellpadding="0" cellspacing="0" class="display" id="example">
							<thead>
							<tr>
								<th>No.</th>
								<th>Nim</th>
								<th>Nama</th>
								<th>HP</th>
								<th class="action">Aksi</th>
							</tr>
							</thead>
							<tbody>
						<?php $no=1;if ($queryMahasiswa):?>
							<?php foreach ($queryMahasiswa as $mahasiswa):?>
							<?php if($no%2>0){?>
							<tr>
							<?php }else{?>
							<tr class="odd">
							<?php } ?>
								<td><?php echo $no++;?></td>
								<td><?php echo $mahasiswa->nim;?></td>
								<td><?php echo $mahasiswa->nama;?></td>
                                <td><?php echo $mahasiswa->hp;?></td>
                                <td class="action"><a href="<?php echo base_url().$class;?>/editMahasiswa/<?php echo $mahasiswa->id_mahasiswa;?>" class="edit">Edit</a><a href="#" onClick="hapus('<?php echo base_url().$class; ?>/hapusMahasiswa/<?php echo $mahasiswa->id_mahasiswa;?>')" class="delete">Hapus</a></td>
                            </tr>
							<?php endforeach;?>
						<?php else: ?>
							<tr>
								<td colspan="5" align="center">
									Tidak ada data
								</td>
							</tr>
						<?php endif;?>
							</tbody>
							<tfoot>
							<tr>
								<th>No.</th>
								<th>Nim</th>
								<th>Nama</th>
								<th>HP</th>
								<th class="action">Aksi</th>
							</tr>
							</tfoot>
                        </table>
						<p>&nbsp;</p>
					<script type="text/javascript">
						function s(o){o.value=o.value.replace(/([^a-zA-Z .])/g,"");}
						function n(o){o.value=o.value.replace(/([^0-9])/g,"");}
					</script>              	
					<form name="mahasiswa" action="" method="post" onSubmit="return validasi_mahasiswa(mahasiswa)" class="jNice">
					<h3>Tambah Mahasiswa</h3>
                    	<fieldset>
							<input type="hidden" class="text-long" name="kode_matakuliah" id="kode_matakuliah" value="<?php foreach ($queryMatakuliah as $kuliah):?><?php echo $kuliah->kode_matakuliah;?><?php endforeach;?>"/>
							<p><label>NIM:</label><input type="text" class="text-long" name="nim" id="nim" maxlength="8" onkeydown="n(this)" onkeyup="n(this)" onblur="n(this)" onclick="n(this)"/></p>
                        	<p><label>Nama:</label><input type="text" class="text-long" name="nama" id="nama" onkeydown="s(this)" onkeyup="s(this)" onblur="s(this)" onclick="s(this)"/></p>
                        	<p><label>HP:</label><input type="text" class="text-long" name="hp" id="hp" maxlength="14" onkeydown="n(this)" onkeyup="n(this)" onblur="n(this)" onclick="n(this)"/></p>
                            <input type="submit" value="Submit" /><input type="reset" value="Reset" />
                        </fieldset>
                    </form>
                </div>