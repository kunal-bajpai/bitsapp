<?php

class User extends databaseObject{

protected static $tableName='Users';

public static function find_special_admins()
{
      return User::find_by_sql("SELECT Users.regIDGeneral, Users.regIDCircle, Users.regIDRest, Users.ID, Users.username, Users.firstName, Users.lastName FROM Users JOIN SpecialAdmins ON SpecialAdmins.userID=Users.ID");
}

public static function find_by_username($username)
{
  $result_object= User::find_by_sql("SELECT * FROM ".self::$tableName." WHERE username='{$username}';"); 
  return $result_object[0];
}
  
public function is_special_admin()
{
  $specialAdmins=User::find_by_sql("SELECT * FROM ".self::$tableName." JOIN SpecialAdmins ON Users.ID=SpecialAdmins.userID");
  if(isset($specialAdmins))
    foreach($specialAdmins as $specialAdmin)
      if($specialAdmin->ID==$this->ID)
        return true;
  return false;
}
  
public function is_admin_of($circle)
{
  $adminArray=$circle->find_admins();
  if(isset($adminArray))
    foreach($adminArray as $admin)
      if($admin->ID==$this->ID)
        return true;
  return false;
} 
 
public function is_member_of($circle)
{
  $memberArray=$circle->find_members();
  if(isset($memberArray))
    foreach($memberArray as $member)
      if($member->ID==$this->ID)
        return true;
  return false;
} 
 
public function make_special_admin()
{
    global $db;
    if(!$this->is_special_admin())
        $db->query("INSERT INTO SpecialAdmins VALUES ('{$this->ID}');");
}

public function remove_special_admin()
{
    global $db;
    if($this->is_special_admin())
        $db->query("DELETE FROM SpecialAdmins WHERE userID='{$this->ID}';");
}

}

?>
