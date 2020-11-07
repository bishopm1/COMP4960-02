<?php 
  require('verification/VerifyTimeSlot.php');

  /** 
   * This script passes data gotten from the time-slot
   * form into the time-slot verification class. If it 
   * passes verification, the script will then send
   * the time-slot data to the database.
   * @author Nick Foley
   */
  if(VerifyTimeSlot::verifyTimeDriver($_POST['timeslotStartTime'], $_POST['timeslotEndTime']) === TRUE){
    require_once "code_camp_dbconnect.php";
    
    $sql = "INSERT INTO timeslot(start_time, end_time)
    VALUES('". $_POST['timeslotStartTime'] ."','".$_POST['timeslotEndTime'] ."')";
    
    $link->query($sql);
    mysqli_close($link);
    
    echo "Data was sent!";
    
  }
  else{
    echo "Data was not sent!";
    exit(0);
  }
?>