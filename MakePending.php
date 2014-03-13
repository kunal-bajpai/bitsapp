<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
	$update=Update::find_by_id($_POST['id']);
	$update->updateStatus=2;
	$update->save();
?>