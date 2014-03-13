<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
	GcmLog::clear_logs();
	echo GcmLog::show_logs();
?>