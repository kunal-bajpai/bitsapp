<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/mybits/includes/init.php");
    if(isset($_POST['email']))
    {
        $arr=(array) json_decode(stripslashes($_POST['email']));
        if(is_array($arr))
        	foreach($arr as $feature=>$emails)
        		foreach($emails as $email)
    			{
    				$ch=curl_init();
    				$sender=trim($email->sender);
    				$data=trim($email->data);           //notation is because json decode makes $email of type stdclass not array
    				$feature=trim($email->feature);
    				$host=trim($email->host);
    				curl_setopt($ch, CURLOPT_POST, true);
    				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    				// Disabling SSL Certificate support temporarly
    				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    				switch(strtolower(str_replace(' ','',$feature)))
    				{
    				    case "newupdate":
    				        preg_match("/HEAD\s*:(.*)BODY\s*:(.*)CIRCLE:(.*)/i",$data,$match);
    				        if(verify_registration($sender) && $host=="goa.bits-pilani.ac.in")
    				            if(isset($match[0]) && isset($match[1]) && isset($match[2]) && isset($match[3]))
    				            {
    				                $circleNicks=explode(',',$match[3]);
    				                if(is_array($circleNicks))
    				                {
    				                    $auth='';
    				                    $unauth='';
    				                    $invalid='';
    				                    $msg='';
    				                    foreach($circleNicks as $circleNick)
    				                    {
    				                        $circle=Circle::find_by_nick(trim($circleNick));
    				                        $user=User::find_by_username(trim($sender));
    				                        if(isset($circle))
    				                            if($user->is_member_of($circle) || $user->is_admin_of($circle) || $user->is_special_admin())
    				                                $auth.=$circle->circleNick."_";
    				                            else
    				                                $unauth.=$circle->circleNick.", ";
    				                        else
    				                            $invalid.=$circleNick.", ";
    				                    }
    				                    $auth=trim($auth,"_");
    				                    $unauth=trim($unauth,",");
    				                    $invalid=trim($invalid,",");
    				                    if($auth!='')
    				                    {
    				                        $fields['updateHead']=$match[1];
    				                        $fields['updateBody']=$match[2];
    				                        $fields['updateCircles']=$auth;
    				                        $fields['updateAuthor']=$sender;
    				                        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    				                        curl_setopt($ch, CURLOPT_URL, "http://www.mobappclub.com/mybits/NewUpdate.php");
    				                        $result=curl_exec($ch);
    				                        $msg.="Successfully sent update to ".implode(",",explode("_",$auth)).".";
    				                    }
    				                    if($unauth!='')
    				                        $msg.="You are not an admin of ".$unauth.".";
    				                    if($invalid!='')
    				                        $msg.="Following circle nicks are invalid: ".$invalid.".";
                                        if($result==1)
    				                        echo mail($sender.'@'.$host,"Update request status",$msg,"From: BITSApp <mobileapplicationclub@gmail.com>");
                                        else
                                            echo mail($sender.'@'.$host,"Request failed","Your request failed due to an issue on the server.","From: BITSApp <mobileapplicationclub@gmail.com>");
    				                }
    				                else
    				                    echo mail($sender.'@'.$host,"Failed update","The update you tried to send had invalid circle nicks","From: BITSApp <mobileapplicationclub@gmail.com>");
    				            }
    				            else
    				                echo mail($sender.'@'.$host,"Incorrect format","Your email format was incorrect","From: BITSApp <mobileapplicationclub@gmail.com>");
    				        else
    				            echo mail($sender.'@'.$host,"Unregistered","Please register first","From: BITSApp <mobileapplicationclub@gmail.com>");
    				        break;
    				    case "approveupdate":
    				        preg_match("/UPDATE\s*:(.*)ACTION\s*:(.*)/i",$data,$match);
    				        if(verify_registration($sender) && $host=="goa.bits-pilani.ac.in")
    				            if(isset($match[0]) && isset($match[1]) && isset($match[2]))
    				            {
    				                $updateIDs=explode(',',$match[1]);
    				                if(is_array($updateIDs))
    				                {
    				                    $auth='';
    				                    $unauth='';
    				                    $invalid='';
    				                    $msg='';
    				                    foreach($updateIDs as $updateID)
    				                    {
    				                        $update=Update::find_by_id(trim($updateID));
    				                        $user=User::find_by_username(trim($sender));
    				                        if(isset($update))
    				                        {
    				                            $circle=Circle::find_by_nick($update->circleNick);
    				                            if($user->is_admin_of($circle) || $user->is_special_admin())
    				                                $auth.=$updateID."_";
    				                            else
    				                                $unauth.=$updateID.", ";
    				                        }
    				                        else
    				                            $invalid.=$updateID.", ";
    				                    }
    				                    $auth=trim($auth,"_");
    				                    $unauth=trim($unauth,",");
    				                    $invalid=trim($invalid,",");
    				                    if($auth!='')
    				                    {
    				                        $fields['updates']=$auth;
    				                        if(strtolower(trim($match[2]))=='accept')
    				                            $fields['action']=1;
    				                        elseif(strtolower(trim($match[2]))=='reject')
    				                            $fields['action']=2;
    				                        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    				                        curl_setopt($ch, CURLOPT_URL, "http://www.mobappclub.com/mybits/ApproveUpdate.php");
    				                        $result=curl_exec($ch);
    				                        $msg.="Successfully moderated update to ".implode(",".explode("_",$auth)).".";
    				                    }
    				                    if($unauth!='')
    				                        $msg.="You are not authorised to moderate updates ".$unauth.".";
    				                    if($invalid!='')
    				                        $msg.="Following update IDs are invalid: ".$invalid.".";
                                        if($result==1)
    				                        echo mail($sender.'@'.$host,"Update moderation status",$msg,"From: BITSApp <mobileapplicationclub@gmail.com>");
                                        else
                                            echo mail($sender.'@'.$host,"Request failed","Your request failed due to an issue on the server.","From: BITSApp <mobileapplicationclub@gmail.com>");
    				                }
    				                else
    				                    echo mail($sender.'@'.$host,"Failed update moderation","The update(s) you tried to moderate had invalid IDs","From: BITSApp <mobileapplicationclub@gmail.com>");
    				            }
    				            else
    				                echo mail($sender.'@'.$host,"Incorrect format","Your email format was incorrect","From: BITSApp <mobileapplicationclub@gmail.com>");
    				        else
    				            echo mail($sender.'@'.$host,"Unregistered","Please register first","From: BITSApp <mobileapplicationclub@gmail.com>");
    				        break;
    				    case "register":
    				        preg_match("/FIRST NAME\s*:(.*)LAST NAME\s*:(.*)/i", $data, $match);
    				        if($host=="goa.bits-pilani.ac.in")
    				        {
    				            if(isset($match[0]) && isset($match[1]) && isset($match[2]))
    				            {
    				                $user=User::find_by_username($sender);
    				                if(!isset($user))
    				                    $user=new User();
    				    	        $user->firstName=trim($match[1]);
    				                $user->lastName=trim($match[2]);
    				    	        echo mail($sender."@goa.bits-pilani.ac.in","MyBITS Registration","You have been registered",'From: BITSApp <mobileapplicationclub@gmail.com>');
    				    	        $user->save();
    				            }
    				            else
    				                echo mail($sender.'@'.$host,"Incorrect format","Your email format was incorrect","From: BITSApp <mobileapplicationclub@gmail.com>");
    				        }
    				        else
    				            echo mail($sender."@".$host,"MyBITS Registration failed","You must register using your BITS id",'From: BITSApp <mobileapplicationclub@gmail.com>'); 
    				        break;
    				    case "addmember":
    				        preg_match("/USERNAMES\s*:(.*)CIRCLENICK\s*:(.*)/i", $data, $match);
    				        if(verify_registration($sender) && $host=="goa.bits-pilani.ac.in")
    				            if(isset($match[0]) && isset($match[1]) && isset($match[2]))
    				            {
    				                $circle=Circle::find_by_nick(trim($match[2]));
    				                if(isset($circle))
    				                {
    				                    $user=User::find_by_username(trim($sender));
    				                    if($user->is_admin_of($circle))
    				                    {
    				                        $usernames=explode(',',$match[1]);
    				                        if(is_array($usernames))
    				                        {
    				                            $valid='';
    				                            $invalid='';
    				                            $msg='';
    				                            foreach($usernames as $username)
    				                                if(verify_registration($username))
    				                                    $valid.=$username."_";
    				                                else
    				                                    $invalid.=$username.", ";
    				                            $valid=trim($valid,"_");
    				                            $invalid=trim($invalid,",");
    				                            if($valid!='')
    				                            {
    				                                $fields['username']=trim($valid,'_');
    				                                $fields['circleNick']=$circle->circleNick;
    				                                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    				                                curl_setopt($ch, CURLOPT_URL, "http://www.mobappclub.com/mybits/AddMember.php");
    				                                $result=curl_exec($ch);
    				                                $msg.="Successfully added ".implode(",".explode("_",$valid))." to ".$circle->circleNick.".";
    				                            }
    				                            if($invalid!='')
    				                                $msg.="Following usernames are unregistered: ".$invalid.".";
                                                if($result==1)
    				                                echo mail($sender.'@'.$host,"Add admin status",$msg,"From: BITSApp <mobileapplicationclub@gmail.com>");
                                                else
                                                    echo mail($sender.'@'.$host,"Request failed","Your request failed due to an issue on the server.","From: BITSApp <mobileapplicationclub@gmail.com>");
    				                        }
    				                        else
    				                            echo mail($sender.'@'.$host,"No usernames given","No usernames were provided to add as admin","From: BITSApp <mobileapplicationclub@gmail.com>");
    				                    }
    				                    else
    				                        echo mail($sender.'@'.$host,"Unauthorised action","You are not an admin of ".$circle->circleNick,"From: BITSApp <mobileapplicationclub@gmail.com>");
    				                }
    				                else
    				                    echo mail($sender.'@'.$host,"Invalid circle nick",$match[2]." is an invalid circle nick","From: BITSApp <mobileapplicationclub@gmail.com>");
    				            }
    				            else
    				                echo mail($sender.'@'.$host,"Incorrect format","Your email format was incorrect","From: BITSApp <mobileapplicationclub@gmail.com>");
    				        else
    				            echo mail($sender.'@'.$host,"Unregistered","Please register first","From: BITSApp <mobileapplicationclub@gmail.com>");
    				        break;
    				    case "addadmin":
    				        preg_match("/USERNAMES\s*:(.*)CIRCLENICK\s*:(.*)/i", $data, $match);
    				        if(verify_registration($sender) && $host=="goa.bits-pilani.ac.in")
    				            if(isset($match[0]) && isset($match[1]) && isset($match[2]))
    				            {
    				                $circle=Circle::find_by_nick(trim($match[2]));
    				                if(isset($circle))
    				                {
    				                    $user=User::find_by_username(trim($sender));
    				                    if($user->is_admin_of($circle))
    				                    {
    				                        $usernames=explode(',',$match[1]);
    				                        if(is_array($usernames))
    				                        {
    				                            $valid='';
    				                            $invalid='';
    				                            $msg='';
    				                            foreach($usernames as $username)
    				                                if(verify_registration($username))
    				                                    $valid.=$username."_";
    				                                else
    				                                    $invalid.=$username.", ";
    				                            $valid=trim($valid,"_");
    				                            $invalid=trim($invalid,",");
    				                            if($valid!='')
    				                            {
    				                                $fields['username']=trim($valid,'_');
    				                                $fields['circleNick']=$circle->circleNick;
    				                                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    				                                curl_setopt($ch, CURLOPT_URL, "http://www.mobappclub.com/mybits/AddAdmin.php");
    				                                $result=curl_exec($ch);
    				                                $msg.="Successfully added ".implode(",".explode("_",$valid))." to ".$circle->circleNick.".";
    				                            }
    				                            if($invalid!='')
    				                                $msg.="Following usernames are unregistered: ".$invalid.".";
    				                            if($result==1)
                                                    echo mail($sender.'@'.$host,"Add admin status",$msg,"From: BITSApp <mobileapplicationclub@gmail.com>");
                                                else
                                                    echo mail($sender.'@'.$host,"Request failed","Your request failed due to an issue on the server.","From: BITSApp <mobileapplicationclub@gmail.com>");
    				                        }
    				                        else
    				                            echo mail($sender.'@'.$host,"No usernames given","No usernames were provided to add as admin","From: BITSApp <mobileapplicationclub@gmail.com>");
    				                    }
    				                    else
    				                        echo mail($sender.'@'.$host,"Unauthorised action","You are not an admin of ".$circle->circleNick,"From: BITSApp <mobileapplicationclub@gmail.com>");
    				                }
    				                else
    				                    echo mail($sender.'@'.$host,"Invalid circle nick",$match[2]." is an invalid circle nick","From: BITSApp <mobileapplicationclub@gmail.com>");
    				            }
    				            else
    				                echo mail($sender.'@'.$host,"Incorrect format","Your email format was incorrect","From: BITSApp <mobileapplicationclub@gmail.com>");
    				        else
    				            echo mail($sender.'@'.$host,"Unregistered","Please register first","From: BITSApp <mobileapplicationclub@gmail.com>");
    				        break;
    				    case "removemember":
    				        preg_match("/USERNAMES\s*:(.*)CIRCLENICK\s*:(.*)/i", $data, $match);
    				        if(verify_registration($sender) && $host=="goa.bits-pilani.ac.in")
    				            if(isset($match[0]) && isset($match[1]) && isset($match[2]))
    				            {
    				                $circle=Circle::find_by_nick(trim($match[2]));
    				                if(isset($circle))
    				                {
    				                    $user=User::find_by_username(trim($sender));
    				                    if($user->is_admin_of($circle))
    				                    {
    				                        $usernames=explode(',',$match[1]);
    				                        if(is_array($usernames))
    				                        {
    				                            $valid='';
    				                            $invalid='';
    				                            $msg='';
    				                            foreach($usernames as $username)
    				                                if(verify_registration($username))
    				                                    $valid.=$username."_";
    				                                else
    				                                    $invalid.=$username.", ";
    				                            $valid=trim($valid,"_");
    				                            $invalid=trim($invalid,",");
    				                            if($valid!='')
    				                            {
    				                                $fields['username']=trim($valid,'_');
    				                                $fields['circleNick']=$circle->circleNick;
    				                                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    				                                curl_setopt($ch, CURLOPT_URL, "http://www.mobappclub.com/mybits/RemoveMember.php");
    				                                $result=curl_exec($ch);
    				                                $msg.="Successfully added ".implode(",".explode("_",$valid))." to ".$circle->circleNick.".";
    				                            }
    				                            if($invalid!='')
    				                                $msg.="Following usernames are unregistered: ".$invalid.".";
    				                            if($result==1)
                                                    echo mail($sender.'@'.$host,"Add admin status",$msg,"From: BITSApp <mobileapplicationclub@gmail.com>");
                                                else
                                                    echo mail($sender.'@'.$host,"Request failed","Your request failed due to an issue on the server.","From: BITSApp <mobileapplicationclub@gmail.com>");
    				                        }
    				                        else
    				                            echo mail($sender.'@'.$host,"No usernames given","No usernames were provided to add as admin","From: BITSApp <mobileapplicationclub@gmail.com>");
    				                    }
    				                    else
    				                        echo mail($sender.'@'.$host,"Unauthorised action","You are not an admin of ".$circle->circleNick,"From: BITSApp <mobileapplicationclub@gmail.com>");
    				                }
    				                else
    				                    echo mail($sender.'@'.$host,"Invalid circle nick",$match[2]." is an invalid circle nick","From: BITSApp <mobileapplicationclub@gmail.com>");
    				            }
    				            else
    				                echo mail($sender.'@'.$host,"Incorrect format","Your email format was incorrect","From: BITSApp <mobileapplicationclub@gmail.com>");
    				        else
    				            echo mail($sender.'@'.$host,"Unregistered","Please register first","From: BITSApp <mobileapplicationclub@gmail.com>");
    				        break;
    				    case "removeadmin":
    				        preg_match("/USERNAMES\s*:(.*)CIRCLENICK\s*:(.*)/i", $data, $match);
    				        if(verify_registration($sender) && $host=="goa.bits-pilani.ac.in")
    				            if(isset($match[0]) && isset($match[1]) && isset($match[2]))
    				            {
    				                $circle=Circle::find_by_nick(trim($match[2]));
    				                if(isset($circle))
    				                {
    				                    $user=User::find_by_username(trim($sender));
    				                    if($user->is_admin_of($circle))
    				                    {
    				                        $usernames=explode(',',$match[1]);
    				                        if(is_array($usernames))
    				                        {
    				                            $valid='';
    				                            $invalid='';
    				                            $msg='';
    				                            foreach($usernames as $username)
    				                                if(verify_registration($username))
    				                                    $valid.=$username."_";
    				                                else
    				                                    $invalid.=$username.", ";
    				                            $valid=trim($valid,"_");
    				                            $invalid=trim($invalid,",");
    				                            if($valid!='')
    				                            {
    				                                $fields['username']=trim($valid,'_');
    				                                $fields['circleNick']=$circle->circleNick;
    				                                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    				                                curl_setopt($ch, CURLOPT_URL, "http://www.mobappclub.com/mybits/RemoveAdmin.php");
    				                                $result=curl_exec($ch);
    				                                $msg.="Successfully added ".implode(",".explode("_",$valid))." to ".$circle->circleNick.".";
    				                            }
    				                            if($invalid!='')
    				                                $msg.="Following usernames are unregistered: ".$invalid.".";
    				                            if($result==1)
                                                    echo mail($sender.'@'.$host,"Add admin status",$msg,"From: BITSApp <mobileapplicationclub@gmail.com>");
                                                else
                                                    echo mail($sender.'@'.$host,"Request failed","Your request failed due to an issue on the server.","From: BITSApp <mobileapplicationclub@gmail.com>");
    				                        }
    				                        else
    				                            echo mail($sender.'@'.$host,"No usernames given","No usernames were provided to add as admin","From: BITSApp <mobileapplicationclub@gmail.com>");
    				                    }
    				                    else
    				                        echo mail($sender.'@'.$host,"Unauthorised action","You are not an admin of ".$circle->circleNick,"From: BITSApp <mobileapplicationclub@gmail.com>");
    				                }
    				                else
    				                    echo mail($sender.'@'.$host,"Invalid circle nick",$match[2]." is an invalid circle nick","From: BITSApp <mobileapplicationclub@gmail.com>");
    				            }
    				            else
    				                echo mail($sender.'@'.$host,"Incorrect format","Your email format was incorrect","From: BITSApp <mobileapplicationclub@gmail.com>");
    				        else
    				            echo mail($sender.'@'.$host,"Unregistered","Please register first","From: BITSApp <mobileapplicationclub@gmail.com>");
    				        break;
                        case "mycircles":
        			        if(verify_registration($sender) && $host=="goa.bits-pilani.ac.in")
                            {
                                $admin='';
                                $member='';
                                $msg='';
                                $user=User::find_by_username($sender);
                                if($user->is_special_admin())
                                    echo mail($sender.'@'.$host,"You are a special admin for all circles.","My circles","From: BITSApp <mobileapplicationclub@gmail.com>");
                                else
                                {
                                    $adminCircles=Circle::find_for_admin($user);
                                    if(is_array($adminCircles))
                                        foreach($adminCircles as $adminCircle)
                                            $admin.=$adminCircle->circleName." (".$adminCircle->circleNick."), ";
                                    $memberCircles=Circle::find_for_member($user);
                                    if(is_array($memberCircles))
                                        foreach($memberCircles as $memberCircle)
                                            $member.=$memberCircle->circleName." (".$memberCircle->circleNick."), ";
                                    $admin=trim($admin,",");
                                    $member=trim($member,",");
                                    if($admin!='')
                                        $msg.="You are an admin of ".$admin.".";
                                    if($member!='')
                                        $msg.="You are a member of ".$member.".";
                                    if($msg='')
                                        $msg.="You are not registered under any circle";
                                    echo mail($sender.'@'.$host,"My circles",$msg,"From: BITSApp <mobileapplicationclub@gmail.com>");    
                                }
                            }
                            else
        			            echo mail($sender.'@'.$host,"Unregistered","Please register first","From: BITSApp <mobileapplicationclub@gmail.com>");
    				        break;
                        case "pendingupdates":
            		        if(verify_registration($sender) && $host=="goa.bits-pilani.ac.in")
                            {
                                $updates=Update::find_update_for_admin($sender);
                                $msg='';
                                if(is_array($updates))
                                {    
                                    foreach($updates as $update)
                                    {
                                        $author=User::find_by_id($update->updateAuthor);
                                        $msg.="Update ID {$update->ID} from {$author->firstName} {$author->lastName}\r\n{$update->circleName}\r\r{$update->head}\r\n{$update->body}\r\n\r\n";
                                    }
                                    echo mail($sender.'@'.$host,"Pending updates",$msg,"From: BITSApp <mobileapplicationclub@gmail.com>");
                                }
                                else
                                    echo mail($sender.'@'.$host,"Pending updates","No updates pending","From: BITSApp <mobileapplicationclub@gmail.com>");
                            }
                            else
        			            echo mail($sender.'@'.$host,"Unregistered","Please register first","From: BITSApp <mobileapplicationclub@gmail.com>");
    				        break;
                    }
    				curl_close($ch);
    			}
        else
            echo 0;
	}
?>