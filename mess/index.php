<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
    if($messSession->is_logged_in())
		$messSession->logout();
	if(sizeof($_POST)>0)
	{
		$user=new MessAdmin();
		$user->get_values();
		if($user->authenticate())
		{
			$messSession->login($user);
			header("Location:viewMenu.php");
		}
		else
			echo "Invalid username/password";
	}
?>
<html>
	<body>
        <h1>BITSApp Mess Login</h1>
		<form method='POST'>
			Username <input type='text' name='username' size='20'/><br/>
			Password <input type='password' name='password' size='20'/><br/>
			<input type='submit' />
		</form>
	</body>
</html>