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
    
    if($_POST["ddRoomName"] == '0'){
      $sql = "INSERT INTO room(room_name, capacity)
      VALUES('". $_POST['boxRoomName'] ."','". $_POST['roomCapacity'] ."')";
  }
  else{
      $sql = "UPDATE room SET room_name = '".$_POST['boxRoomName']."', 
      capacity = '".$_POST['roomCapacity']."' WHERE room_name = '".$_POST['boxRoomName']."'";
  }
    
    $link->query($sql);
    mysqli_close($link);
    
    $location = "<script>location.href = ('room-screen.php'); alert('Work has been submitted!');</script>";
    echo $location;
    
  }
  else{
    $location = "<script>location.href = ('room-screen.php'); alert('Work wasn't submitted!');</script>";
    echo $location;
  }
?>