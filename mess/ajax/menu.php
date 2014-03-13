<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
    $user=$session->logged_in_user();
    if($user->username!='amess' && $user->username!='cmess')
        $menu=Menu::find_by_sql("SELECT Menu.ID, Mess.username, Menu.day, Menu.breakfast, Menu.lunch, Menu.snacks, Menu.dinner FROM Menu JOIN Mess ON Menu.mess=Mess.ID");
    else
        $menu=Menu::find_by_sql("SELECT Menu.ID, Mess.username, Menu.day, Menu.breakfast, Menu.lunch, Menu.snacks, Menu.dinner FROM Menu JOIN Mess ON Menu.mess=Mess.ID WHERE Mess.username='{$user->username}';");
    if(is_array($menu))
        foreach($menu as $item)
            unset($item->fields);
    echo give_json($menu);
?>