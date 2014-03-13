<?php
/*
    POST:updates (IDs separated by _),action(1 accept,2 reject)
    ACTION:Checks if update is already accepted or rejected. If not then sets according to action.
    RESPONSE:array with keys accepted, rejected and successful for updates that were already accepted and rejected
        and those that were successfully altered.
*/
  require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
  if(isset($_POST['updates']))
  {
    $updateIDArray=explode('_',$_POST['updates']);
    if(is_array($updateIDArray))
	    foreach($updateIDArray as $updateID)
	    {	
	      $update=Update::find_by_id($updateID);
	      if($update->updateStatus==1)
	      	$returnObject['accepted'][]=$update->ID;
	      else
	      	{
		      	if($update->updateStatus==3)
			      	$returnObject['rejected'][]=$update->ID;
			else
			{
				$returnObject['successful'][]=$update->ID;
				$update->updateStatus=$_POST['action'];
			        $update->save();
			        if($_POST['action']==1)
			        {
			          $circles=Circle::find_circles_for_update($update);
			          if(is_array($circles))
			            foreach($circles as $circle)
			              gcm::send_accepted_update($update,$circle);
	      			}
			}      
	      	}
	    }
    echo 1;
    if(!isset($returnObject['accepted']))
    	$returnObject['accepted'][]="";
    if(!isset($returnObject['rejected']))
    	$returnObject['rejected'][]="";
    if(!isset($returnObject['successful']))
    	$returnObject['successful'][]="";	
    echo give_json($returnObject);
  }
?>