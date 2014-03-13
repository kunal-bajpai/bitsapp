<?php
  class Circle extends DatabaseObject
  {
    protected static $tableName='Circles';
    
    public static function find_by_nick($nick)
    {
      $result_objects=Circle::find_by_sql("SELECT * FROM Circles WHERE circleNick='{$nick}'");
      return $result_objects[0];
    }
    
    public function find_all_alpha()
    {
		return self::find_by_sql("SELECT * FROM ".self::$tableName." ORDER BY circleName ASC");
	}
    
    public static function find_circles_for_update($update)
    {
      $result_objects=Circle::find_by_sql("SELECT Circles.ID, Circles.circleNick, Circles.circleName FROM Circles JOIN CircleUpdate ON CircleUpdate.circleID=Circles.ID JOIN Updates ON Updates.ID=CircleUpdate.updateID WHERE Updates.ID='{$update->ID}'");
      return $result_objects;
    }
    
    public function remove()
    {
        global $db;
        $db->query("DELETE Updates,CircleUpdate FROM Updates JOIN CircleUpdate ON Updates.ID=CircleUpdate.updateID WHERE CircleUpdate.circleID={$this->ID}");
        $db->query("DELETE FROM Admins WHERE circleID={$this->ID}");
        $db->query("DELETE FROM Members WHERE circleID={$this->ID}");
        $this->delete();
    }
    
    public function find_members()
    {
      return User::find_by_sql("SELECT Users.regIDGeneral, Users.regIDCircle, Users.regIDRest , Users.ID, Users.username, Users.firstName, Users.lastName FROM Users JOIN Members ON Members.userID=Users.ID JOIN Circles ON Circles.ID=Members.circleID WHERE Circles.circleNick='{$this->circleNick}'");
    }
    
    public function find_admins()
    {
      return User::find_by_sql("SELECT Users.regIDGeneral, Users.regIDCircle, Users.regIDRest, Users.ID, Users.username, Users.firstName, Users.lastName FROM Users JOIN Admins ON Admins.userID=Users.ID JOIN Circles ON Circles.ID=Admins.circleID WHERE Circles.circleNick='{$this->circleNick}'");
    }
    
    public function find_members_and_admins()
    {
      $resultSet=$this->find_admins();
      $members=$this->find_members();
      if(isset($members))
	      foreach($members as $member)
	        $resultSet[]=$member;
      return $resultSet;
    }
  
    public function make_member($user)
    {
      global $db;
      if(verify_registration($user->username))
      {
        $db->query("INSERT INTO Members (circleID,userID) VALUES ('{$this->ID}','{$user->ID}')");
        $db->query("DELETE FROM Admins WHERE userID='{$user->ID}' AND circleID='{$this->ID}'");
      }
    }
    
    public function remove_member($user)
    {
      global $db;
      if($user->is_member_of($this))
        $db->query("DELETE FROM Members WHERE userID='{$user->ID}' AND circleID='{$this->ID}'");
    }
    
    public function remove_admin($user)
    {
        if($user->is_admin_of($this))
            $this->make_member($user);
    }
    
    public function make_admin($user)
    {
      global $db;
      if(verify_registration($user->username))
      {
            $db->query("INSERT INTO Admins (circleID,userID) VALUES ('{$this->ID}','{$user->ID}')");
            $db->query("DELETE FROM Members WHERE userID='{$user->ID}' AND circleID='{$this->ID}'");
      }
    }
    
    public static function find_for_admin($user)
    {
      return Circle::find_by_sql("SELECT Circles.circleNick, Circles.ID, Circles.circleName FROM Circles JOIN Admins ON Circles.ID=Admins.circleID JOIN Users ON Users.ID=Admins.userID WHERE Users.username='{$user->username}'");
    }

    public static function find_for_member($user)
    {
      return Circle::find_by_sql("SELECT Circles.circleNick, Circles.ID, Circles.circleName FROM Circles JOIN Members ON Circles.ID=Members.circleID JOIN Users ON Users.ID=Members.userID WHERE Users.username='{$user->username}'");
    }
  
	public static function find_for_user($user)
	{
		$adminCircles=Circle::find_for_admin($user);
		$memberCircles=Circle::find_for_member($user);
		if(isset($adminCircles))
			foreach($adminCircles as $circle)
				$resultCircles[]=$circle;
		if(isset($memberCircles))
			foreach($memberCircles as $circle)
				$resultCircles[]=$circle;
		return $resultCircles;
	}
    
}
?>
