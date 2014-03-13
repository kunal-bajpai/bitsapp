<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
    $admins=User::find_special_admins();
	if(is_array($admins))
		foreach($admins as $admin)
		{
			$customObject['username']=$admin->username;
			$customObject['firstName']=$admin->firstName;
			$customObject['lastName']=$admin->lastName;
			$returnArray[]=$customObject;
		}
	echo give_json($returnArray);
?>