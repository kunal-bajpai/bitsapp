<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
    $session->require_login();
?>
<html>
    <body>
        <?php require_once(SITE_ROOT."/mess/header.php"); ?>
        <table id="menu" border="1">
        <tr><td> </td>
            <?php 
                $menu=new Menu();
                if(is_array($menu->fields))
                    foreach($menu->fields as $field)
                        if($field=="breakfast" || $field=="lunch" || $field=="snacks" || $field=="dinner" || $field=="day")
                            echo "<td>{$field}</td>";
            ?>
        </tr>
        </table>
    </body>
    <script src="../javascript/viewMenu.js" type="text/javascript"></script>
</html>