<?php
    class MessSession extends Session {
        protected static $userClass='MessAdmin', $userTable='Mess', $sessionVar='id', $loginPage=MESS_LOGIN_PAGE, $userField='username';   
    }
    $messSession=new MessSession(); 
?>