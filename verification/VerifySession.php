<?php 

include('VerifySQL.php');

/** 
*  This is a verification class that performs 
*  verification on inputs recieved from the session form
*  @author Nick Foley
*/ 
Class VerifySession extends VerifySQL{
  
  /**
   * @param $sessionName 
   * @return boolean
   */
  public static function verifySessionDriver($sessionName){
      if(self::verifySessionName($sessionName) == FALSE){
        return FALSE;
      }
      else{
        return TRUE;
      }
  }
  
  /**
   * @param $sessionName 
   * @return boolean
   */
  public static function verifySessionName($sessionName){
    if(gettype($sessionName) != string || !isset($sessionName)){
      echo "You must enter a session name!";
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
  
}
?>