<?php 

include('VerifySQL.php');

/** 
*  This is a verification class that performs 
*  verification on inputs recieved from the speaker form
*  @author Nick Foley
*/ 
Class VerifySpeaker extends VerifySQL{
  
  /**
   * @param $speakerFirstName 
   * @param $speakerLastName 
   * @param $speakerEmail 
   * @param $speakerPhoneOne 
   * @param $speakerPhoneTwo 
   * @return boolean
   */
  public static function verifySpeakerDriver($speakerFirstName, $speakerLastName, $speakerEmail, $speakerPhoneOne, $speakerPhoneTwo){
    if(self::validateSpeakerName($speakerFirstName) == FALSE){
      return FALSE;
    }
    elseif(self::validateSpeakerName($speakerLastName) == FALSE){
      return FALSE;
    }
    elseif(self::validateSpeakerEmail($speakerEmail) == FALSE){
      return FALSE;
    }
    elseif(self::validateSpeakerPhoneNumber($speakerPhoneOne) == FALSE){
      return FALSE;
    }
    elseif(strcmp($speakerPhoneTwo,"") !== 0){
      if(self::validateSpeakerPhoneNumber($speakerPhoneTwo) == FALSE){
        return FALSE;
      }
    }
    else{
      return TRUE;
    }
  }

  /**
   * @param $speakerName
   * @return boolean
   */
  private static function validateSpeakerName($speakerName){
    if(gettype($speakerName) != string || !isset($speakerName)){
      echo "You must enter a First and Last name!\n";
      return FALSE;
    }
    elseif(VerifySQL::checkSQL($speakerName) == FALSE){
      echo "SQL commands can't be inputs!\n";
      return FALSE;
    }
    else{
      return TRUE;
    }
  }

  /**
   * @param $speakerEmail
   * @return boolean
   */
  private static function validateSpeakerEmail($speakerEmail){ 
    if(gettype($speakerEmail) != string || !isset($speakerEmail)){
      echo "You must enter an email!\n";
      return FALSE;
    }
    elseif(VerifySQL::checkSQL($speakerEmail) == FALSE){
      echo "SQL commands can't be inputs!\n";
      return FALSE;
    }
    elseif(strpos($speakerEmail, '@') === FALSE){
      echo "Your email must contain an @\n";
      return FALSE;
    }
    else{
      return TRUE;
    }
  }

  /**
   * @param $speakerPhoneNum
   * @return boolean
   */
  private static function validateSpeakerPhoneNumber($speakerPhoneNum){
    if(!is_numeric($speakerPhoneNum) || !isset($speakerPhoneNum)){
      echo "You must enter a Phone Number!\n";
      return FALSE;
    }
    else if(strlen($speakerPhoneNum) != (10 || 11)){
      echo "You must enter the full phone number!";
      return FALSE;
    }
    else{
      return TRUE;
    }
  }
}
?>