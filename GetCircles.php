<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
  $user=User::find_by_username($_POST['username']);
  $circles=Circle::find_all();
  if(is_array($circles))
      foreach($circles as $circle)
      {
        if($user->is_admin_of($circle) && $circle->circleNick!='all')
          $result_circles['admin'][]=$circle;
        else
          if($user->is_member_of($circle))
            $result_circles['member'][]=$circle;
          else
            $result_circles['other'][]=$circle;
      }
  echo give_json($result_circles);
?>
