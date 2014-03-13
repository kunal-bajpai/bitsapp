<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
	if(isset($_POST['username']))
	{
		$user=User::find_by_username($_POST['username']);
		$circles=Circle::find_for_user($user);
        if(is_array($circles))
    		foreach($circles as $circle)
    			if($circle->circleNick!='all')
    			{	
    				$members=$circle->find_members();
                    if(is_array($members))
        				foreach($members as $member)
        				{
        					$customObject['circleNick']=$circle->circleNick;
        					$customObject['username']=$member->username;
        					$customObject['firstName']=$member->firstName;
        					$customObject['lastName']=$member->lastName;
        					$returnArray[]=$customObject;
        				}
    			}
		echo give_json($returnArray);
	}
?>
