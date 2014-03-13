<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
    if($session->is_logged_in())
		$session->logout();
	if(sizeof($_POST)>0)
	{
		$user=new AppAdmin();
		$user->get_values();
		if($user->authenticate())
		{
			$session->login($user);
			header("Location:viewCircles.php");
		}
		else
			echo "Invalid username/password";
	}
?>
<html>
	<body>
        <h1>MyBITS admin login</h1>
		<form method='POST'>
			Username <input type='text' name='username' size='20'/><br/>
			Password <input type='password' name='password' size='20'/><br/>
			<input type='submit' />
		</form>
	</body>
</html>