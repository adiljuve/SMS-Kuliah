                <h2><?php echo $title;?> &raquo; Edit Pesan Balasan SMS Kuliah</h2>
                
                <div id="main">
                	<form name="kuliah" action="" method="post" class="jNice">
					<h3>Form Matakuliah</h3>
                    	<fieldset>
							<?php foreach ($queryBalasan as $balasan):?>
							<p><a href="<?php echo base_url(); ?>admin/balasan" class="out">Kembali ke Daftar</a></p>
							<input type="hidden" name="id_balasan" id="id_balasan" value="<?php echo $balasan->id;?>"/>
                        	<p><label>Keyword:</label><input type="text" class="text-long" name="keyword" id="keyword" value="<?php echo $balasan->keyword;?>" readonly/></p>
							<p><label>Pesan:</label><textarea name="pesan" id="pesan" ><?php echo $balasan->pesan;?></textarea></p>
							<p><b>CATATAN!! jangan mengubah kata yang terletak di antara tanda "[" dan "]", contoh: [matakuliah].</b></p>
							<?php endforeach;?>
                            <input type="submit" value="Submit" /><input type="reset" value="Reset" />
                        </fieldset>
                    </form>
                </div>
                <!-- // #main -->