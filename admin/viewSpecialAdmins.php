<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
    $session->require_login();
    require_once(SITE_ROOT."/admin/header.php");
	if(isset($_POST['admins']))
		if(is_array($_POST['admins']))
			foreach($_POST['admins'] as $username)
			{
				$user=User::find_by_username($username);
                $user->remove_special_admin();
                gcm::send_remove_special_admin($user);
			}
	$admins=User::find_by_sql("SELECT Users.firstName,Users.lastName,Users.username FROM Users JOIN SpecialAdmins ON SpecialAdmins.userID=Users.ID ORDER BY Users.firstName ASC");
	echo "<h2>Special admins</h2><br/>";	
	echo "<form method='POST'>";
	if(is_array($admins))
		foreach($admins as $admin)
			echo "<input type='checkbox' name='admins[]' value='{$admin->username}' id='check{$admin->username}'/><label for='check{$admin->username}'>{$admin->firstName} {$admin->lastName} ({$admin->username})</label><br/>";
	else
		echo "No special admins added.<br/>";			
	echo "<input type='submit' value='Remove special admin' /></form>";
?>
