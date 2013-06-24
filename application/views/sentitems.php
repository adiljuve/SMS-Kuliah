<h2><?php echo $title;?> &raquo; Pesan Terkirim</h2>
                <div id="main">                	
					<h3>Daftar Pesan Terkirim</h3>
						<form action="<?php echo base_url(); ?>pesan/hapusSentitems/" onSubmit="return onDelete();" name="myform" method="post">
							<table cellpadding="0" cellspacing="0" class="display" id="example">
							<thead>
							<tr>
								<th><input type='checkbox' name='pilih' onclick='pilihan()' /></th>
								<th>Waktu</th>
								<th>Nomor Tujuan</b></th>	
								<th>Isi Pesan</th>
								<th>Pengirim</th>
								<th>Status</th>
							</tr>
							</thead>
							<tbody>
						<?php 
							$no=0;						
							if ($querySentitems):
						?>
							<?php foreach ($querySentitems as $sent):?>
							<?php if($no%2>0){?>
							<tr>
							<?php }else{?>
							<tr class="odd">
							<?php } ?>
								<td><input type="checkbox" name="hapus[]" id="hapus" value="<?php echo $sent->ID;?>"></td>
								<td><?php echo tgl_indo($sent->UpdatedInDB);?></td>
								<td><?php echo $sent->DestinationNumber;?></td>
								<td><?php echo htmlentities($sent->TextDecoded);?></td>
								<td><?php echo $sent->CreatorID;?></td>
								<td><?php echo $sent->Status;?></td>
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
								<th></th>
								<th>Waktu</th>
								<th>Nomor Tujuan</b></th>	
								<th>Isi Pesan</th>
								<th>Pengirim</th>
								<th>Status</th>
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