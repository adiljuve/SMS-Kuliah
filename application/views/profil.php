<h2><?php echo $title;?> &raquo; Profil</h2>
				<div id="main">
					<script type="text/javascript">
						function f(o){o.value=o.value.replace(/([^a-zA-Z0-9])/g,"");}
					</script>
                	<form name="profil" action="" method="post" onSubmit="return check_profil(profil)" class="jNice">
					<h3>Form Profil</h3>
                    	<fieldset>
                        	<p><label>Username:</label><input type="text" class="text-long" name="username" id="username" value="<?php if($queryAdmin): echo $queryAdmin->username; endif;?>" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></p>
                            <input type="submit" value="Submit" /><input type="reset" value="Reset" />
                        </fieldset>
                    </form> 						
                </div>