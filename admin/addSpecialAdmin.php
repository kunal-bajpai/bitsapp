<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
    $session->require_login();
    require_once(SITE_ROOT."/admin/header.php");
    if(isset($_POST['username']))
    {
        $username=str_replace(' ','',$_POST['username']);
        $usernames=explode(',',$username);
        if(is_array($usernames))
            foreach($usernames as $username)
                if(verify_registration($username))
                {
                    $user=User::find_by_username($username);
                    if(!$user->is_special_admin())
                    {
                        $user->make_special_admin();
                        $userCopy=new User();
                        unset($userCopy->fields);
                        unset($userCopy->ID);
                        $userCopy->username=$user->username;
                        $userCopy->firstName=$user->firstName;
                        $userCopy->lastName=$user->lastName;
                        $success[]=$userCopy;
                    }
                    else
                        $admins[]=$username;
                }
                else
                    $unreg[]=$username;
                if(isset($success))
                    gcm::send_add_special_admin($success);
        $msg='';
        if(is_array($success))
        {
            foreach($success as $user)
                $msg.=$user->username.",";
            $msg=trim($msg,",");
            echo $msg.' made special admin .';
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
                echo $msg.' is already special admin.';
            else
                echo $msg.' are already special admins.';
        }
    }
?>
<html>
    <body>
        <form method='POST'>
            username <input type='text' name='username'/><br/>
            <input type='submit' />
        </form>
    </body>
</html>