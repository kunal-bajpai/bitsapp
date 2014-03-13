<?php
class Update extends databaseObject{
protected static $tableName='Updates';
  
public static function find_update_for_admin($username)
{
  return Update::find_by_sql("SELECT Circles.circleNick, Circles.circleName, Updates.ID, Updates.updateHead, Updates.updateBody, Updates.updateAuthor, Updates.timestamp FROM Updates JOIN CircleUpdate ON CircleUpdate.updateID=Updates.ID JOIN Admins ON Admins.circleID=CircleUpdate.circleID JOIN Users ON Admins.userID=Users.ID JOIN Circles ON Circles.ID=Admins.circleID WHERE Users.username='{$username}' AND Updates.updateStatus=2");
}
    
public static function find_update_for_circle($circleNick)
{
  return Update::find_by_sql("SELECT Circles.circleNick, Circles.circleName, Updates.ID, Updates.updateHead, Updates.updateBody, Updates.updateAuthor, Updates.timestamp FROM Updates JOIN CircleUpdate ON CircleUpdate.updateID=Updates.ID JOIN Circles ON Circles.ID=CircleUpdate.circleID WHERE Circles.circleNick='{$circleNick}' AND Updates.updateStatus=2");
}
  
public function add_to_circle($circle)
{
  global $db;
  $this->save();
  $db->query("INSERT INTO CircleUpdate (circleID,updateID) VALUES ({$circle->ID},{$this->ID})");
}
}
?>