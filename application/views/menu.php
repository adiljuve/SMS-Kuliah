        <ul id="mainNav">
        	<li><a href="<?php echo base_url();?>pesan" <?php echo ($navsection == 'index') ? ' class="active"' : ''; ?>>PESAN</a></li>
			<li><a href="<?php echo base_url();?>kimia" <?php echo ($navsection == 'kimia') ? ' class="active"' : ''; ?>>T. KIMIA</a></li>
			<li><a href="<?php echo base_url();?>industri" <?php echo ($navsection == 'industri') ? ' class="active"' : ''; ?>>T. INDUSTRI</a></li>
        	<li><a href="<?php echo base_url();?>informatika" <?php echo ($navsection == 'informatika') ? ' class="active"' : ''; ?>>T. INFORMATIKA</a></li>
        	<li><a href="<?php echo base_url();?>elektro" <?php echo ($navsection == 'elektro') ? ' class="active"' : ''; ?>>T. ELEKTRO</a></li>
        	<li><a href="<?php echo base_url();?>mesin" <?php echo ($navsection == 'mesin') ? ' class="active"' : ''; ?>>T. MESIN</a></li>			
        	<li class="right"><a href="#" onClick="logout('<?php echo base_url();?>logout')">LOGOUT</a></li>
			<li class="right"><a href="<?php echo base_url();?>admin" <?php echo ($navsection == 'admin') ? ' class="active"' : ''; ?>>ADMIN</a></li>
        </ul>