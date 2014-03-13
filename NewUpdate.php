<?php
/*
    POST:updateHead,updateBody,updateAuthor,updateCircles(circleNicks separated by _)
    ACTION:Creates a new update. Checks if user is special admin or admin of circle then accepts automatically and 
        sends gcm otherwise sends for approval to circle admins.
    RESPONSE:1 when script completes
*/
  require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
  if(isset($_POST['updateHead']) && isset($_POST['updateBody']) && isset($_POST['updateAuthor']))
  {
    $user=User::find_by_username($_POST['updateAuthor']);
    $circleNickArray=explode('_',$_POST['updateCircles']);
    unset($_POST['updateCircles']);
    if(is_array($circleNickArray))
        foreach($circleNickArray as $circleNick)
        {
          $update=new Update();
          $update->get_values();
          $update->timestamp=time()+TIME_DIFF;
          $circle=Circle::find_by_nick($circleNick);
          if($user->is_admin_of($circle) || $user->is_special_admin())
          {
            $update->updateStatus='1';
            $update->add_to_circle($circle);
            gcm::send_accepted_update($update,$circle);
          }
          else
          {
            $update->updateStatus='2';
            $update->add_to_circle($circle);
            gcm::send_pending_update($update,$circle);
          }
        }
    echo 1;
  }
?>