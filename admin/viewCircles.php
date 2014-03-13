<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
    $session->require_login();
    require_once(SITE_ROOT."/admin/header.php");
	if(isset($_POST['circles']))
		if(is_array($_POST['circles']))
			foreach($_POST['circles'] as $id)
			{
				$circle=Circle::find_by_id($id);
                gcm::send_remove_circle($circle);
				$circle->remove();			
			}
	$circles=Circle::find_all_alpha();
	echo "<h2>Circles</h2><br/>";	
	echo "<form method='POST'>";
	if(is_array($circles))
		foreach($circles as $circle)
			echo "<input type='checkbox' name='circles[]' value='{$circle->ID}' id='check{$circle->ID}'/><label for='check{$circle->ID}'>{$circle->circleName}({$circle->circleNick})</label> <br/>";
	else
		echo "No circles added.<br/>";			
	echo "<input type='submit' value='Remove circle' /></form>";
?>
