<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
  if(isset($_POST['username']) && isset($_POST['circleNick']))
	{
		$circle=Circle::find_by_nick($_POST['circleNick']);
		$usernameArray=explode('_',$_POST['username']);
		if(is_array($usernameArray))
		{
			foreach($usernameArray as $username)
				if(verify_registration($username))
				{
					$user=User::find_by_username($username);
                    if(!$user->is_admin_of($circle))
					    $circle->make_admin($user);
					$userCopy=new User();
					unset($userCopy->fields);
					unset($userCopy->ID);
					$userCopy->firstName=$user->firstName;
					$userCopy->lastName=$user->lastName;
					$userCopy->username=$user->username;
                    $userCopy->circleNick=$circleNick;
					$resultArr[]=$userCopy;
				}
				else
					$unregUsers[]=$username;
			gcm::send_add_admin($resultArr);
		}
		echo 1;
		if(isset($unregUsers))
			echo give_json($unregUsers);
	}
?>
