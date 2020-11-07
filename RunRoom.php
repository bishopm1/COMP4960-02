<?php 
  require('verification/VerifyRoom.php');

  /** 
   * This script passes data gotten from the room
   * form into the room verification class. If it 
   * passes verification, the script will then send
   * the room data to the database.
   * @author Nick Foley
   */
   if(VerifyRoom :: verifyRoomDriver($_POST['boxRoomName'],$_POST['roomCapacity']) === TRUE ){
    require_once "code_camp_dbconnect.php";
    
    $sql = "INSERT INTO room(room_name, capacity)
    VALUES('". $_POST['boxRoomName'] ."','". $_POST['roomCapacity'] ."')";
    
    $link->query($sql);
    mysqli_close($link);
    
    echo "Data was sent!";
    
  }
  else{
    echo "Data was not sent!";
    exit(0);
  }
?>