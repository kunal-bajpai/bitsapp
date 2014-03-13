<?php
	/* connect to gmail */
	$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
	$username = 'mobileapplicationclub@gmail.com';
	$password = 'mobappclub';
   	$features = array("New update","Register","Approve update","Add member","Add admin","Remove member");
	$ch = curl_init();
    // Set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Disabling SSL Certificate support temporarly
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	/* try to connect */
	$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
	
    if(is_array($features))
        foreach($features as $feature)
        {
        	/* grab emails */
        	$emails = imap_search($inbox,'UNSEEN SUBJECT "'.$feature.'"');
        
        	/* if emails are returned, cycle through each... */
        	if($emails)
            {
		        /* put the newest emails on top */
	    		rsort($emails);
	
				/* for every email... */
				foreach($emails as $email_number) 
				{
					/* get information specific to this email */
					$overview = imap_headerinfo($inbox,$email_number,0);
					$message = imap_fetchbody($inbox,$email_number,2);
					$message=str_replace('\r','',$message);
					$message=str_replace('\n','. ',$message);
					$message=preg_replace("/<(.*?)>/",'',$message);
					$resultObj = array(
						'feature' => $feature,
			   			     'data' => $message,
			   			     'sender' => $overview->from[0]->mailbox,
			   			     'host' => $overview->from[0]->host
		   			     );
		   			$objArr[strtolower(str_replace(' ','',$feature))][]=$resultObj;
		   		}
		   }
		}
	$post['email']=json_encode($objArr);
	curl_setopt($ch, CURLOPT_URL, "http://www.mobappclub.com/mybits/includes/emailParser.php"); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	// Execute post
	$result = curl_exec($ch);
	echo $result;
	if ($result === FALSE)
		die('Curl failed: ' . curl_error($ch));
    
	/* close the connection */
	imap_close($inbox);
	?>
