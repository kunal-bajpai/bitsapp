<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
    $session->require_login();
    require_once(SITE_ROOT."/admin/header.php");
	if(isset($_POST['admins']))
		if(is_array($_POST['admins']))
        {
			foreach($_POST['admins'] as $pair)
			{
                $arr=explode('_',$pair);
                $circle=Circle::find_by_nick($arr[0]);
				$user=User::find_by_username($arr[1]);
                $circle->make_member($user);
                $user->circleNick = $circle->circleNick;
                $userArr[] = $user;
			}
            gcm::send_remove_admin($userArr);
        }
	$admins=User::find_by_sql("SELECT Users.firstName,Users.lastName,Users.username,Circles.circleNick,Circles.circleName FROM Users JOIN Admins ON Admins.userID=Users.ID JOIN Circles ON Circles.ID=Admins.circleID ORDER BY Circles.circleName ASC");
	echo "<h2>Admins</h2><br/>";	
	echo "<form method='POST'>";
	if(is_array($admins))
		foreach($admins as $admin)
			echo "<input type='checkbox' name='admins[]' value='{$admin->circleNick}_{$admin->username}' id='check{$admin->circleNick}_{$admin->username}'/><label for='check{$admin->circleNick}_{$admin->username}'>{$admin->circleName} ({$admin->circleNick}) : {$admin->firstName} {$admin->lastName} ({$admin->username})</label><br/>";
	else
		echo "No admins added.<br/>";			
	echo "<input type='submit' value='Remove admin' /></form>";
?>
