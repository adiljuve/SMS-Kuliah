<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SMS Kuliah | <?php echo $title;?></title>
<style type="text/css">
body{
	font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif; 
	font-size:12px;
}
p, h1, form, button{border:0; margin:0; padding:0;}
.spacer{clear:both; height:1px;}
/* ----------- My Form ----------- */
.myform{
	margin:0 auto;
	width:400px;
	padding:14px;
	background: #fbfbfb;
}
	/* ----------- basic ----------- */
	#basic{
		border:solid 2px #DEDEDE;
	}
	#basic h1 {
		font-size:14px;
		font-weight:bold;
		margin-bottom:8px;
	}
	#basic p{
		font-size:11px;
		color:#666666;
		margin-bottom:20px;
		border-bottom:solid 1px #dedede;
		padding-bottom:10px;
	}
	#basic label{
		display:block;
		font-weight:bold;
		text-align:right;
		width:140px;
		float:left;
	}
	#basic .small{
		color:#666666;
		display:block;
		font-size:11px;
		font-weight:normal;
		text-align:right;
		width:140px;
	}
	#basic input{
		float:left;
		width:200px;
		margin:2px 0 30px 10px;
	}
	#basic button{ 
		font: 11px Arial, Helvetica, sans-serif;
		color: #646464;
		width: 94px;
		height: 29px;
		cursor: pointer;
		border: none;
		background: url(style/img/button-submit.gif) no-repeat left top;
		margin-left:150px;
	}

</style>
<script type="text/javascript">
function cek(form){
		if ((form.username.value=="")||(form.pass.value==""))
		{
			return false;
		}else{
			form.submit();
			return true;
		}
}
</script>
</head>

<body>
<div id="basic" class="myform">
  <form id="login" name="login" method="post" action="" onSubmit="return cek(login)">
    <h1>Log-in Mahasiswa</h1>
	<p><img src="style/img/logo.png"/></p>
    <label>Username
        <span class="small">Masukkan Usermane</span>
    </label>
    <input type="text" name="username" id="username" />
    
    <label>Password
    <span class="small">Masukkan Password</span>
    </label>
    <input type="password" name="pass" id="pass" />
	
    <button  type="submit">Login</button>
    <div class="spacer"></div>


  </form>
</div>
</body>
</html>
