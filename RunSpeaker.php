<?php 

/** 
   * This script passes data gotten from the speaker
   * form into the speaker verification class. If it 
   * passes verification, the script will then send
   * the session data to the database.
   * @author Nick Foley
   */

  require('verification/VerifySpeaker.php');
  
  //Pre-processing phone numbers 1 and 2
  $speakerPhone = str_replace('-',"",$_POST["speakerPhoneNum1"]);
  $speakerPhone = str_replace(')',"",$speakerPhone);
  $speakerPhone = str_replace('(',"",$speakerPhone);
  
  $speakerPhone2 = str_replace('-',"",$_POST["speakerDayOfPhoneNum"]);
  $speakerPhone2 = str_replace(')',"",$speakerPhone2);
  $speakerPhone2 = str_replace('(',"",$speakerPhone2);
  
  //This checks if the information us being deleted or updated
  if($_POST["action"] == 'Delete'){
      require_once "code_camp_dbconnect.php";
      $sql = "DELETE FROM speaker WHERE speakerID = '".$_POST['ddSpeakerName']."'";
      $link->query($sql);
        mysqli_close($link);
    
        $location = "<script>location.href = ('speaker-screen.php'); alert('".$_POST['speakerFirstName']." ".$_POST['speakerLastName']." has been deleted');</script>";
        echo $location;
  }
  
  else{
    if(VerifySpeaker::verifySpeakerDriver($_POST["speakerFirstName"], $_POST["speakerLastName"], $_POST["speakerEmail"], 
    $speakerPhone, $speakerPhone2) === TRUE){
    require_once "code_camp_dbconnect.php";
    
    if($_POST["ddSpeakerName"] == '0'){
        $sql = "INSERT INTO speaker(first_name, last_name, email_address, phonenum1, phonenum2)
        VALUES('". $_POST["speakerFirstName"] ."','".$_POST["speakerLastName"] ."',
        '".$_POST["speakerEmail"] ."','". $speakerPhone ."',
        '". $speakerPhone2 ."')";
    }
    else{
        $sql = "UPDATE speaker SET first_name = '".$_POST["speakerFirstName"]."', 
        last_name = '".$_POST["speakerLastName"]."', email_address = '".$_POST["speakerEmail"]."',
        phonenum1 = '".$speakerPhone."', phonenum2 = '".$speakerPhone2."'
        WHERE speakerID = '".$_POST['ddSpeakerName']."';";
        echo $_POST['ddSpeakerName'];
    }
    
    
    
    $link->query($sql);
    mysqli_close($link);
    
    $location = "<script>location.href = ('speaker-screen.php'); alert('Data has been submitted');</script>";
    echo $location;
    
  }
    else{
        echo "Data was not sent!";
        exit(0);
    }
  }
?>