                <h2><?php echo $title;?> &raquo; Request Dosen</h2>
                
                <div id="main">                	
					<h3>Daftar Request Dosen</h3>
                    	
							<table cellpadding="0" cellspacing="0" class="display" id="example">
							<thead>
							<tr>
								<th>No.</th>
								<th>Nama</th>
								<th>HP</b></th>	
								<th>Pass</th>								
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
                                <td class="action"><a href="<?php echo base_url().$class;?>/editRequest/<?php echo $dosen->id_dosen;?>" class="edit">Edit</a> <a href="#" onClick="aktifkan('<?php echo base_url().$class; ?>/confirmRequest/<?php echo $dosen->id_dosen;?>')" class="delete">Aktifkan</a></td>
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
								<th>Nama</th>
								<th>HP</th>	
								<th>Pass</th>									
								<th class="action">Aksi</th>
							</tr>
							</tfoot>							
                        </table>
						<p>&nbsp;</p>						
                </div>