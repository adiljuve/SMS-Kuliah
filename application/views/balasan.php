                <h2><?php echo $title;?> &raquo; Balasan SMS Kuliah</h2>
                
                <div id="main">                	
					<h3>Daftar Balasan</h3>
							<table cellpadding="0" cellspacing="0" class="display" id="example">
							<thead>
							<tr>
								<th>No.</th>
								<th>Keyword</th>
								<th>Pesan</th>
								<th class="action">Aksi</th>
							</tr>
							</thead>
							<tbody>
						<?php $no=1;if ($queryBalasan):?>
							<?php foreach ($queryBalasan as $balasan):?>
							<?php if($no%2>0){?>
							<tr>
							<?php }else{?>
							<tr class="odd">
							<?php } ?>
								<td><?php echo $no++;?></td>
								<td><?php echo $balasan->keyword;?></td>
								<td><?php echo htmlentities($balasan->pesan);?></td>
                                <td class="action"><a href="<?php echo base_url();?>admin/editBalasan/<?php echo $balasan->id;?>" class="edit">Edit</a></td>								
                            </tr>
							<?php endforeach;?>
						<?php else: ?>
							<tr>
								<td colspan="4" align="center">
									Tidak ada data
								</td>
							</tr>
						<?php endif;?>
							</tbody>
							<tfoot>
							<tr>
								<th>No.</th>
								<th>Keyword</th>
								<th>Pesan</th>
								<th class="action">Aksi</th>
							</tr>
							</tfoot>							
                        </table>
						<p>&nbsp;</p>
                </div>