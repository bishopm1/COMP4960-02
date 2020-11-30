<?php 
  require('verification/VerifySession.php');

  /** 
   * This script passes data gotten from the session
   * form into the session verification class. If it 
   * passes verification, the script will then send
   * the session data to the database.
   * @author Nick Foley
   */
  if($_POST["action"] == 'Delete'){
        require_once "code_camp_dbconnect.php";
        $sql = "DELETE FROM session WHERE topic = '".$_POST['ddSessionName']."'";
        $link->query($sql);
        mysqli_close($link);
    
        $location = "<script>location.href = ('session-screen.php'); alert('".$_POST['ddSessionName']." has been deleted');</script>";
        echo $location;
  }
  else{
    if(VerifySession::verifySessionDriver($_POST["ddSessionName"]) === TRUE){
        require_once "code_camp_dbconnect.php";
    
        if($_POST["ddSessionName"] == '0'){
            $sql = "INSERT INTO session(topic, speaker_speakerID, timeslot_timeslot_ID, room_room_name)
            VALUES('". $_POST["boxSessionName"] ."','".$_POST["ddSpeakerName"] ."',
            '".$_POST["ddTimeSlot"] ."','". $_POST["ddRoomName"] ."')";
        }
        else{
            $sql = "UPDATE session SET topic = '".$_POST["boxSessionName"]."', 
            speaker_speakerID = '".$_POST["ddSpeakerName"]."', timeslot_timeslot_ID = '".$_POST["ddTimeSlot"]."', 
            room_room_name = '".$_POST["ddRoomName"]."'
            WHERE topic = '".$_POST['ddSessionName']."';";
        }
    
        $link->query($sql);
        mysqli_close($link);
    
        $location = "<script>location.href = ('session-screen.php'); alert('".$_POST["boxSessionName"]." has been submitted');</script>";
        echo $location;
    
    }
    else{
        $location = "<script>location.href = ('session-screen.php'); alert('Data was not submitted');</script>";
        echo $location;
    }
 }
?>