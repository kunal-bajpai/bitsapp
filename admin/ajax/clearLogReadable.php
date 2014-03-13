<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
	LogReadable::clear_logs();
	echo LogReadable::show_logs();
?>