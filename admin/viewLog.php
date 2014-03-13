<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");	
    $session->require_login();
	$log=Log::show_logs();
	$logs_readable=LogReadable::show_logs();
    $logs_gcm=GcmLog::show_logs();
?>
<html>
    <?php require_once(SITE_ROOT."/admin/header.php");?>
    <h2>Logs</h2>
	<input type='radio' onchange='check()' name='log' value='1' id='log_readable' checked/><label for='log_readable'>Readable Log</label>&nbsp&nbsp<input type='radio' name='log' value='2' onchange='check()' id='log'/><label for='log'>Database Log</label>&nbsp&nbsp<input type='radio' name='log' value='3' onchange='check()' id='log_gcm'/><label for='log_gcm'>GCM Log</label><br/>
	<button id='clear' >Clear log</button><br/>
	<div id='divLog' style='display:none;overflow:scroll;width:100px;height:100px;'><?php echo $log; ?></div>
	<div id='divLogReadable' style='display:inline;overflow:scroll;width:100px;height:100px;'><?php echo $logs_readable; ?></div>
    <div id='divLogGcm' style='display:none;overflow:scroll;width:100px;height:100px;'><?php echo $logs_gcm; ?></div>
<script type='text/javascript' src='/mybits/javascript/viewLog.js'></script>	
</html>