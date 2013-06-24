                	<ul class="sideNav">
						<li><a href="<?php echo base_url();?>pesan/message" <?php echo ($subnavsection == 'pesan') ? ' class="active"' : ''; ?>>Kirim Pesan</a></li>
                    	<li><a href="<?php echo base_url();?>pesan/inbox" <?php echo ($subnavsection == 'inbox') ? ' class="active"' : ''; ?>>Pesan Masuk</a></li>
						<li><a href="<?php echo base_url();?>pesan/outbox" <?php echo ($subnavsection == 'outbox') ? ' class="active"' : ''; ?>>Pesan Keluar</a></li>
                    	<li><a href="<?php echo base_url();?>pesan/sentitems" <?php echo ($subnavsection == 'sentitems') ? ' class="active"' : ''; ?>>Pesan Terkirim</a></li>
                    </ul>
