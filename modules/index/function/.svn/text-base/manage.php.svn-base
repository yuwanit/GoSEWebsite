<?php

if(!empty($_SESSION['admin_id']))
{
    header('Location: '.PATH.'/menu.html');
}

$_TEMFILE = 'main2';

if($_POST['btnLogin'])
{
	$sql_login = 'SELECT *
		FROM admins
		WHERE admins.username= "'.$_POST['txtUsername'].'"
			AND admins.password= "'.$_POST['txtPassword'].'"';
	$result = $cDB->execute($sql_login);
	$data = $cDB->fetch_array($result);
	
	if($data['username']!='')
	{
		$_SESSION['admin_id'] = $data['admin_id'];
		
		$_SCP = '<script>
				alert("Welcome to GoSE system");
				window.location = "'.PATH.'/menu.html";
			</script>';
	}
	else
	{
		$_SCP = '<script>
				alert("Username or Password Invalid !!!");
				window.location = "'.PATH.'";
			</script>';
	}
}
else
{
	$_CONTENT .= '<form action="'.PATH.'/index.html" id="frmLogin" name="frmLogin" class="login" method="post">
		<h1>Login</h1>
		<input type="textbox" name="txtUsername" id="txtUsername" class="login-input validate[required]" placeholder="Username" autocomplete autofocus />
		<input type="password" name="txtPassword" id="txtPassword" class="login-input validate[required]" placeholder="Password" autocomplete />
		<input type="submit" name="btnLogin" id="btnLogin" value="Submit" class="login-submit" />
  </form>';
	
	$_SCP = '<script>
		$(document).ready(function(){
			$("#frmLogin").validationEngine();
		});
	</script>';
}
?>