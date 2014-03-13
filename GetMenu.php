<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
    $menu=Menu::find_all();
    if(isset($menu))
        echo give_json($menu);
?>