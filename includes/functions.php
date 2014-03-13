<?php
function give_json($obj)
{
  return json_encode($obj);
}

function erase_duplicate_reg($regIDName,$regID,$username)
{
    $dupUsers=User::find_by_sql("SELECT * FROM Users WHERE {$regIDName}='{$regID}' AND username != '{$username}'");
    if(is_array($dupUsers))
        foreach($dupUsers as $dupUser)
        {
            $dupUser->$regIDName='';
            $dupUser->save();
        }
}

function verify_registration($username)
{
  $allUsers=User::find_all();
  foreach($allUsers as $user)
    {
      if($user->username==$username)
        return true;
    }
  return false;
}

function random_double()
{
  $num=0;
  for($i=6;$i>0;$i--)
  	$num=($num*10)+rand(1,9);
  return $num;
}

function process_mails($inbox,$emails,$feature)
{
    /* put the newest emails on top */
    	rsort($emails);
	
		/* for every email... */
		foreach($emails as $email_number) {
		
			/* get information specific to this email */
			$overview = imap_headerinfo($inbox,$email_number,0);
			$message = imap_fetchbody($inbox,$email_number,2);
            $message=trim($message,'\r');
            $message=trim($message,'\n');
			preg_match("/<(.*)>(.*)<(.*)>(.*)/",$message,$arr);
			$result = array(
				'feature' => $feature,
       			     'data' => $arr[2],
       			     'sender' => $overview->from[0]->mailbox,
                    'host' => $overview->from[0]->host
   			     );
			curl_setopt($ch, CURLOPT_URL, "http://www.mobappclub.com/mybits/includes/emailParser.php"); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $result);
			// Execute post
	       		$result = curl_exec($ch);
	       		echo $result;
			if ($result === FALSE) {
           			die('Curl failed: ' . curl_error($ch));
      			}
		}
}
?>