<?php 

include('VerifySQL.php');

/** 
*  This is a verification class that performs 
*  verification on inputs recieved from the Time-Slot form
*  @author Nick Foley
*/ 
Class VerifyTimeSlot extends VerifySQL{
  
  /**
   * @param $startTime 
   * @param $endTime
   * @return boolean
   */
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