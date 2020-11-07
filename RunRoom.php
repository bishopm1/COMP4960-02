<?php 
  require('verification/VerifyRoom.php');
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