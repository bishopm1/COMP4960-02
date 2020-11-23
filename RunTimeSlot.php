<?php 

/** 
   * This script passes data gotten from the timeslot
   * form into the timeslit verification class. If it 
   * passes verification, the script will then send
   * the session data to the database.
   * @author Nick Foley
   */

  require('verification/VerifyTimeSlot.php');

  if($_POST["action"] == 'Delete'){
        require_once "code_camp_dbconnect.php";
        $sql = "DELETE FROM timeslot WHERE timeslot_ID = '".$_POST['ddTimeSlot']."'";
        $link->query($sql);
        mysqli_close($link);
    
        $location = "<script>location.href = ('timeslot-screen.php'); alert('".$_POST['timeslotStartTime']." - ".$_POST['timeslotEndTime']."has been deleted');</script>";
        echo $location;
  }
  else{
    if(VerifyTimeSlot::verifyTimeDriver($_POST['timeslotStartTime'], $_POST['timeslotEndTime']) === TRUE){
        require_once "code_camp_dbconnect.php";
    
        if($_POST["timeslotDd"] == '0'){
            $sql = "INSERT INTO timeslot(start_time, end_time)
            VALUES('". $_POST['timeslotStartTime'] ."','".$_POST['timeslotEndTime'] ."')";
        }
        else{
            $sql = "UPDATE timeslot SET start_time = '".$_POST['timeslotStartTime']."', 
            end_time = '".$_POST['timeslotEndTime']."' WHERE timeslot_ID = '".$_POST['ddTimeSlot']."'";
        }
    
        $link->query($sql);
        mysqli_close($link);
    
        $location = "<script>location.href = ('timeslot-screen.php'); alert('Data has been submitted');</script>";
        echo $location;
    
    }
    else{
        echo "Data was not sent!";
        exit(0);
    }
 }
?>