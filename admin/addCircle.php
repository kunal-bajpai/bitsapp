<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
    $session->require_login();
    require_once(SITE_ROOT."/admin/header.php");
    if(isset($_POST['circleNick']) && isset($_POST['circleName']))
    {
        $circle=Circle::find_by_nick($_POST['circleNick']);
        if(!isset($circle))
            $circle=new Circle();
        $circle->get_values();
        $circle->save();
        gcm::send_add_circle($circle);
        echo "Circle added";
    }
?>
<html>
    <body>
        <form method='POST'>
            circleNick <input type='text' name='circleNick' size='20'/><br/>
            circleName <input type='text' name='circleName' size="100"/><br/>
            <input type='submit' />
        </form>
    </body>
</html>