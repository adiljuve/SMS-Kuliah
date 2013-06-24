<h2><?php echo $title;?> &raquo; Ganti Password</h2>
				<div id="main">					
                	<form name="password" action="" method="post" onSubmit="return check_password(password)" class="jNice">
					<h3>Form Ganti Password</h3>
                    	<fieldset>
                        	<p><label>Password Lama:</label><input type="password" class="text-long" name="pass_lama" id="pass_lama"/></p>
                        	<p><label>Password Baru:</label><input type="password" class="text-long" name="pass_baru" id="pass_baru"/></p>
							<p><label>Password Baru(ulangi):</label><input type="password" class="text-long" name="pass_baru_ulang" id="pass_baru_ulang"/></p>
                            <input type="submit" value="Submit" /><input type="reset" value="Reset" />
                        </fieldset>
                    </form> 						
                </div>