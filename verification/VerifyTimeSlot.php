<?php 

include('VerifySQL.php');
Class VerifyTimeSlot extends VerifySQL{
  
  public static function verifyTimeDriver($startTime, $endTime){
      if(strtotime($startTime) && strtotime($endTime)){
        return TRUE;
      }
      else{
        return FALSE;
      }
  }

}
?>