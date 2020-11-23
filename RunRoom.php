<?php 

/** 
   * This script passes data gotten from the room
   * form into the room verification class. If it 
   * passes verification, the script will then send
   * the session data to the database.
   * @author Nick Foley
   */
  
  require('verification/VerifyRoom.php');
  
  if($_POST["action"] == 'Delete'){
        require_once "code_camp_dbconnect.php";
        $sql = "DELETE FROM room WHERE room_name = '".$_POST['ddRoomName']."'";
        $link->query($sql);
        mysqli_close($link);
    
        $location = "<script>location.href = ('room-screen.php'); alert('".$_POST['ddRoomName']." has been deleted');</script>";
        echo $location;
  }
  else{
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
    
    $location = "<script>location.href = ('room-screen.php'); alert('Data has been submitted');</script>";
    echo $location;
    
    }
    else{
        $location = "<script>location.href = ('room-screen.php'); alert('Data was not submitted');</script>";
        echo $location;
    }
   }
?>