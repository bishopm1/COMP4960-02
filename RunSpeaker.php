<?php 
  require('VerifySpeaker.php');

  /** 
   * This script passes data gotten from the speaker
   * form into the speaker verification class.
   * @author Nick Foley
   */
  if(VerifySpeaker::verifySpeakerDriver($_POST["speakerFirstName"], $_POST["speakerLastName"], $_POST["speakerEmail"], 
  $_POST["speakerPhoneNum1"], $_POST["speakerDayOfPhoneNum"]) === TRUE){
    echo "Data was sent!";
    exit(0);
  }
  else{
    echo "Data was not sent!";
    exit(0);
  }
?>