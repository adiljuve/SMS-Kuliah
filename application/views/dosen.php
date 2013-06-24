                <h2><?php echo $title;?> &raquo; Dosen</h2>
                
                <div id="main">                	
					<h3>Daftar Dosen</h3>
                    	
							<table cellpadding="0" cellspacing="0" class="display" id="example">
							<thead>
							<tr>
								<th>No.</th>
								<th>Nama</th>
								<th>HP</b></th>	
								<th>Pass</th>
								<th class="action">Matakuliah</th>								
								<th class="action">Aksi</th>
							</tr>
							</thead>
							<tbody>
						<?php 
							$no=1;						
							if ($queryDosen):
						?>
							<?php foreach ($queryDosen as $dosen):?>
							<?php if($no%2>0){?>
							<tr>
							<?php }else{?>
							<tr class="odd">
							<?php } ?>
								<td><?php echo $no++;?></td>
								<td><?php echo $dosen->nama_dosen;?></td>
								<td><?php echo $dosen->hp;?></td>
								<td><?php echo $dosen->password;?></td>
								<td class="action"><?php echo $this->db->count_all('matakuliah where id_dosen="'.$dosen->id_dosen.'"');?><a href="<?php echo base_url().$class;?>/tambahMatakuliah/<?php echo $dosen->id_dosen;?>" class="view">Tambah</a></td>								
                                <td class="action"><a href="<?php echo base_url().$class;?>/editDosen/<?php echo $dosen->id_dosen;?>" class="edit">Edit</a> <a href="#" onClick="hapus('<?php echo base_url().$class; ?>/hapusDosen/<?php echo $dosen->id_dosen;?>')" class="delete">Hapus</a></td>
                            </tr>
							<?php endforeach;?>
						<?php else: ?>
							<tr>
								<td colspan="6" align="center">
									Tidak ada data
								</td>
							</tr>
						<?php endif;?>
							</tbody>
							<tfoot>
							<tr>
								<th>No.</th>
								<th>Nama</th>
								<th>HP</th>	
								<th>Pass</th>	
								<th class="action">Matakuliah</th>								
								<th class="action">Aksi</th>
							</tr>
							</tfoot>							
                        </table>
						<p>&nbsp;</p>
					<script type="text/javascript">
						function s(o){o.value=o.value.replace(/([^a-zA-Z .])/g,"");}
						function f(o){o.value=o.value.toUpperCase().replace(/([^0-9A-Z])/g,"");}
						function n(o){o.value=o.value.replace(/([^0-9])/g,"");}
					</script>
                	<form name="dosen" action="" method="post" onSubmit="return validasi_dosen(dosen)" class="jNice">
					<h3>Form Dosen</h3>
                    	<fieldset>
                        	<p><label>Nama:</label><input type="text" class="text-long" name="nama" id="nama" onkeydown="s(this)" onkeyup="s(this)" onblur="s(this)" onclick="s(this)"/></p>
                        	<p><label>HP:</label><input type="text" class="text-long" name="hp" id="hp" maxlength="14" onkeydown="n(this)" onkeyup="n(this)" onblur="n(this)" onclick="n(this)"/></p>
                        	<p><label>Pass (Huruf Kapital dan Angka):</label><input type="text" class="text-long" name="password" id="password" maxlength="5" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></p>
							<input type="submit" value="Submit" /><input type="reset" value="Reset" />
                        </fieldset>
                    </form> 						
                </div>