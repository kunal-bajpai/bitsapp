<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
    if(isset($_POST['id']) && (isset($_POST['breakfast']) || isset($_POST['lunch']) || isset($_POST['dinner']) || isset($_POST['snacks'])))
    {
        $item = Menu::find_by_id($_POST['id']);
        unset($_POST['id']);
        $item->get_values();
        $item->save();
        gcm::send_menu($item);
        echo 1;
    }
?>