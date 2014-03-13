<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
	if(isset($_POST['username']))
	{
		$circles=Circle::find_all();
		if(is_array($circles))
			foreach($circles as $circle)
				if($circle->circleNick!='all')
				{	
					$admins=$circle->find_admins();
					if(is_array($admins))
						foreach($admins as $admin)
						{
							$customObject['circleNick']=$circle->circleNick;
							$customObject['username']=$admin->username;
							$customObject['firstName']=$admin->firstName;
							$customObject['lastName']=$admin->lastName;
							$returnArray[]=$customObject;
						}
				}
		echo give_json($returnArray);
	}
?>
