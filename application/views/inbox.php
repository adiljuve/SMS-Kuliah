<h2><?php echo $title;?> &raquo; Pesan Masuk</h2>
                <div id="main">                	
					<h3>Daftar Pesan Masuk</h3>
						<form action="<?php echo base_url(); ?>pesan/hapusInbox/" onSubmit="return onDelete();" name="myform" method="post">
							<table cellpadding="0" cellspacing="0" class="display" id="example">
							<thead>
							<tr>
								<th><input type='checkbox' name='pilih' onclick='pilihan()' /></th>
								<th>Waktu</th>
								<th>Pengirim</b></th>	
								<th>Isi Pesan</th>
							</tr>
							</thead>
							<tbody>
						<?php 
							$no=0;						
							if ($queryInbox):
						?>
							<?php foreach ($queryInbox as $inbox):?>
							<?php if($no%2>0){?>
							<tr>
							<?php }else{?>
							<tr class="odd">
							<?php } ?>
								<td><input type="checkbox" name="hapus[]" id="hapus" value="<?php echo $inbox->ID;?>"></td>
								<td><?php echo tgl_indo($inbox->UpdatedInDB);?></td>
								<td><?php echo $inbox->SenderNumber;?></td>
								<td><?php echo htmlentities($inbox->TextDecoded);?></td>
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
								<th></th>
								<th>Waktu</th>
								<th>Pengirim</b></th>	
								<th>Isi Pesan</th>
							</tr>
							</tfoot>							
                        </table>	
							<p>&nbsp;</p>
							<fieldset>
							<input type="submit" value="Hapus" name="submit"/> 
							<input type="reset" value="Batal" name="reset"/>
							</fieldset>
						</form>
                </div>