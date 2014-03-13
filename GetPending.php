<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
    if(isset($_POST['username']))
    {
        $updates=Update::find_update_for_admin($_POST['username']);
        if(isset($updates))
            echo give_json($updates);
        else
            echo 0;
    }
?>