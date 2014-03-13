<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
    $session->require_login();
    require_once(SITE_ROOT."/admin/header.php");
    if(isset($_POST['circleNick']) && isset($_POST['username']))
    {
        $circleNick=str_replace(' ','',$_POST['circleNick']);
        $username=str_replace(' ','',$_POST['username']);
        $circle=Circle::find_by_nick($circleNick);
        if(isset($circle))
        {
            $usernames=explode(',',$username);
            if(is_array($usernames))
                foreach($usernames as $username)
                    if(verify_registration($username))
                    {
                        $user=User::find_by_username($username);
                        if(!$user->is_admin_of($circle))
                        {
                            $circle->make_admin($user);
                            $userCopy=new User();
                            unset($userCopy->fields);
                            unset($userCopy->ID);
                            $userCopy->username=$user->username;
                            $userCopy->firstName=$user->firstName;
                            $userCopy->lastName=$user->lastName;
                            $userCopy->circleNick=$circle->circleNick;
                            $success[]=$userCopy;
                        }
                        else
                            $admins[]=$username;
                    }
                    else
                        $unreg[]=$username;
            if(isset($success))
                gcm::send_add_admin($success);
        }
        else
            echo $circleNick.' is an invalid circle nick.';
        $msg='';
        if(is_array($success))
        {
            foreach($success as $user)
                $msg.=$user->username.",";
            $msg=trim($msg,",");
            echo $msg.' made admin of '.$circle->circleName.".";
        }
        $msg='';
        if(is_array($unreg))
        {
            foreach($unreg as $username)
                $msg.=$username.",";
            $msg=trim($msg,",");
            if(count($unreg)==1)
                echo $msg.' is an unregistered user.';
            else
                echo $msg.' are unregistered users';
        }
        $msg='';
        if(is_array($admins))
        {
            foreach($admins as $username)
                $msg.=$username.",";
            $msg=trim($msg,",");
            if(count($admins)==1)
                echo $msg.' is already admin of '.$circle->circleName.' .';
            else
                echo $msg.' are already admins of '.$circle->circleName.' .';
        }
    }
?>
<html>
    <body>
        <form method='POST'>
            circleNick <input type='text' name='circleNick' /><br/>
            username <input type='text' name='username'/><br/>
            <input type='submit' />
        </form>
    </body>
</html>