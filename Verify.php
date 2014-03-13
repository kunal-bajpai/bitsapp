<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
	if(isset($_POST['username']))
	{
		$user=User::find_by_username($_POST['username']);
		if($user->password==$_POST['password'])
		{
			$user->password='';
			$user->save();
			echo 1;
		}
		else
			echo 0;
	}
?>