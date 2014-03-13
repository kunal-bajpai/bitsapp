<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/mobappclub/mybits/includes/init.php');
  if(sizeof($_POST)>0)
  {
      foreach(array('regIDGeneral','regIDCircle','regIDRest') as $regIDName)
          if(isset($_POST[$regIDName]))
            erase_duplicate_reg($regIDName,$_POST[$regIDName],$_POST['username']);
      if(!isset($_POST['regIDGeneral']) && !isset($_POST['regIDCircle']) && !isset($_POST['regIDRest']))
      {
    	  $user=User::find_by_username($_POST['username']);
    	  if(!isset($user))
    	    $user=new User();
    	  $user->get_values();
          unset($user->serial);
    	  $user->password=random_double();
          if($user->save())
    	    echo mail($_POST['username']."@goa.bits-pilani.ac.in","BITSApp Password",$user->password,'From: BITSApp <mobileapplicationclub@gmail.com>');
          else
            echo 0;
      }
      else
      {
      	$user=User::find_by_username($_POST['username']);
        if(!isset($user))
            $user=new User();
        if($user->serial != $_POST['serial'] && !empty($user->regIDRest))
            gcm::send_unregister($user->regIDRest);
        $user->get_values();
        echo $user->save();
      }   
  }
?>