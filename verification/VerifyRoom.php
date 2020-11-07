<?php 

include('VerifySQL.php');

/** 
*  This is a verification class that performs 
*  verification on inputs recieved from the room form
*  @author Nick Foley
*/ 
Class VerifyRoom extends VerifySQL{
  
  /**
   * @param $roomName 
   * @param $roomCapacity
   * @return boolean
   */
  public static function verifyRoomDriver($roomName, $roomCapacity){
      if(self::verifyRoomName($roomName) == FALSE){
        return FALSE;
      }
      else if(self::verifyRoomCapacity($roomCapacity) == FALSE){
        return FALSE;
      }
      else{
        return TRUE;
      }
  }
  
  /**
   * @param $roomName 
   * @return boolean
   */
  public static function verifyRoomName($roomName){
    if(gettype($roomName) != string || !isset($roomName)){
      echo "You must enter a room name!";
      echo "<br>";
      return FALSE;
    }
    elseif(VerifySQL::checkSQL($roomName) == FALSE){
      echo "SQL commands can't be inputs!";
      echo "<br>";
      return FALSE;
    }
    else{
      return TRUE;
    }
  }
  
  /**
   * @param $roomCapacity 
   * @return boolean
   */
  public static function verifyRoomCapacity($roomCapacity){
    if(!is_numeric($roomCapacity) || !isset($roomCapacity)){
      echo "You must enter a room capacity!";
      echo "<br>";
      return FALSE;
    }
    else{
      return TRUE;
    }
  }
}
?>