<?php
  class gcm
  {
    
    private static function get_reg_ID($circle,$server)
    {
      if($circle->circleNick=='all')
      	$users=User::find_all();
      else
      	$users=$circle->find_members_and_admins();
      $regID='regID'.$server;
      if(isset($users))
        foreach($users as $user)
            if($user->$regID!='')
                $resultSet[]=$user->$regID;
      return $resultSet;
    }
    
    private static function get_admin_reg_ID($circle,$server)
    {
      if($circle->circleNick=='all')
      	$users=User::find_special_admins();
      else
      	$users=$circle->find_admins();
      $regID='regID'.$server;
      if(isset($users))
        foreach($users as $user)
            if($user->$regID!='')
                $resultSet[]=$user->$regID;
      return $resultSet;
    }
    
    private static function split_into_sets($completeSet)
    {
      for($i=0;$i<count($completeSet);$i++)
          $resultSet[$i/1000][]=$completeSet[$i];
      return $resultSet;
    }
    
    private static function send_curl($data,$regIDs,$key)
      {
          global $db;
         // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';
        $fields = array(
            'registration_ids' => $regIDs,
            'data' => $data,
        );
 
        $headers = array(
            'Authorization: key=' . $key,
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
 
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        // Execute post
        $result = curl_exec($ch);
        $resultObj = json_decode($result);
        for($i=0;$i<count($regIDs);$i++)
            if($resultObj->results[$i]->error=='NotRegistered')
            {
                $user=User::find_by_sql("SELECT * FROM Users WHERE regIDGeneral = '".$regIDs[$i]."' OR regIDCircle = '".$regIDs[$i]."' OR regIDRest = '".$regIDs[$i]."';");
                $resultObj->unreg[]=$user[0]->username;
            }
        GcmLog::log_action(give_json($resultObj));
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
      }
    
    private static function send_update($update,$circle)
    {
        if($update->feature=='PendingUpdate')
          if($circle->circleNick=='all')
            $completeSet=gcm::get_admin_reg_ID($circle,'General');
          else
            $completeSet=gcm::get_admin_reg_ID($circle,'Circle');
        else
            if($update->feature=='AcceptedUpdate')
              if($circle->circleNick=='all')
                $completeSet=gcm::get_reg_ID($circle,'General');
              else
                $completeSet=gcm::get_reg_ID($circle,'Circle');
      $splitSet=gcm::split_into_sets($completeSet);
      $update->circleNick=$circle->circleNick;
      if(isset($splitSet))
        foreach($splitSet as $set)
            if($circle->circleNick=='all')
                gcm::send_curl($update,$set,GOOGLE_API_KEY_GENERAL);
            else
                gcm::send_curl($update,$set,GOOGLE_API_KEY_CIRCLE);
    }
    
    public static function send_accepted_update($update,$circle)
    {
      $update->feature='AcceptedUpdate';
      self::send_update($update,$circle);
    }
    
    public static function send_pending_update($update,$circle)
    {
      $update->feature='PendingUpdate';
      self::send_update($update,$circle);
    }
    
    private static function send_member($userArray,$circle,$feature)
    {
      $completeSet=gcm::get_reg_ID($circle,'Rest');
      $splitSet=gcm::split_into_sets($completeSet);
      $resultObject['feature']=$feature;
      $resultObject['userArray']=$userArray;
      if($feature != 'AddAdmin' && $feature != 'RemoveAdmin')
        $resultObject['circleNick']=$circle->circleNick;
      if(isset($splitSet))
        foreach($splitSet as $set)
         gcm::send_curl($resultObject,$set,GOOGLE_API_KEY_REST);
    }
    
    private static function send_circle($circle,$feature)
    {
      $recCircle=Circle::find_by_nick('all');
      $completeSet=gcm::get_reg_ID($recCircle,'Rest');
      $splitSet=gcm::split_into_sets($completeSet);
      $circle->feature=$feature;
      if(isset($splitSet))
        foreach($splitSet as $set)
         gcm::send_curl($circle,$set,GOOGLE_API_KEY_REST);
    }
    
    public static function send_menu($menu)
    {
      $circle=Circle::find_by_nick('all');
      $completeSet=gcm::get_reg_ID($circle,'Rest');
      $splitSet=gcm::split_into_sets($completeSet);
      $menu->feature='MenuChange';
      if(isset($splitSet))
        foreach($splitSet as $set)
           gcm::send_curl($menu,$set,GOOGLE_API_KEY_REST);
    }
    
    public static function send_remove_member($usernameArray,$circle)
    {
        if(is_array($usernameArray))
            foreach($usernameArray as $username)
            {
                $user=User::find_by_username($username);
                $completeSet[]=$user->regIDRest;
            }
      $splitSet=gcm::split_into_sets($completeSet);
      $resultObject['feature']='RemoveMember';
      $resultObject['userArray']=$usernameArray;
      $resultObject['circleNick']=$circle->circleNick;
      if(isset($splitSet))
        foreach($splitSet as $set)
        {
         gcm::send_curl($resultObject,$set,GOOGLE_API_KEY_REST);   
        }
    }
    
    public static function send_add_member($usernameArray,$circle)
    {
    	self::send_member($usernameArray,$circle,'AddMember');
    }
     
    public static function send_remove_admin($userArray)
    {
        $circle=Circle::find_by_nick('all');
    	self::send_member($userArray,$circle,'RemoveAdmin');
    }
    
    public static function send_add_circle($circle)
    {
        self::send_circle($circle,'AddCircle');
    }
    
    public static function send_remove_circle($circle)
    {
        self::send_circle($circle,'RemoveCircle');
    }
    
    public static function send_add_admin($userArray)
    {
        $circle=Circle::find_by_nick('all');
    	self::send_member($userArray,$circle,'AddAdmin');
    }
    
    public static function send_add_special_admin($userArray)
    {
        $circle=Circle::find_by_nick('all');
        self::send_member($userArray,$circle,'AddSpecialAdmin');
    }
    
    public static function send_remove_special_admin($userArray)
    {
        $circle=Circle::find_by_nick('all');
        self::send_member($userArray,$circle,'RemoveSpecialAdmin');
    }
    
    public static function send_unregister($gcmID)
    {
        $splitSet[]=$gcmID;
        $resultObject['feature']='unregister';
        self::send_curl($resultObject,$splitSet,GOOGLE_API_KEY_REST);
    }
  }
?>
