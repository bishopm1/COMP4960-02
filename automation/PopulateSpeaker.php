<?php 

/**
 * This class handles the Back-end communication with the database.
 * @author  Matt Bishop
 */ 
class PopulateSpeaker {
    
    /**
     * This function puts all of the Speaker names inside of the drop-down menu.
    */
    public static function populateName(){
        
		require "code_camp_dbconnect.php";
        $sql = "SELECT * FROM speaker";
        $result = $link->query($sql);
        
        $options = "";
    
        while ($row = mysqli_fetch_row($result)) {
            $options = $options . "<option value='".$row[5]."'>" .$row[0]." ".$row[1]." - ".$row[2]."</option>";
        }
        echo $options;
        mysqli_close($link);
    }
    
    /**
     * This function handles filling in the Speaker boxes when clicking on an option of
     * the drop-down menu.
    */
    public static function populateBoxes(){
        
        require "code_camp_dbconnect.php";
        $sql = "SELECT * FROM speaker";
        $result = $link->query($sql);
        
        //This variables generates the javascript to auto-fill the boxes
        $fill = "if ((speakerNameDd.value == '0') || (speakerNameDd.value == '-1') ) {
                addOrEdit.textContent = 'Enter';
                editNewSpeakerBtns.style.display = 'none';
                addNewSpeakerBtns.style.display = '';
                if (speakerNameDd.value == 0) {
                    speakerNameDd.style.display = 'none';
                    speakerName.style.display = '';
                }
            }";
            
        while ($row = mysqli_fetch_row($result)) {
                $fill = $fill . "else if(speakerNameDd.value == '".$row[5]."'){
                    addOrEdit.textContent = 'Edit';
					editNewSpeakerBtns.style.display = '';
					addNewSpeakerBtns.style.display = 'none';
					speakerNameDd.style.display = 'none';
					speakerName.style.display = 'none'
					cellSpeakerFirstName.style.display = '';
					cellSpeakerLastName.style.display = '';
                    txtFirstName.value = '".$row[0]."';
					txtLastName.value = '".$row[1]."';
                    txtEmail.value = '".$row[2]."';
					txtPhone1.value = '".$row[3]."';
					txtPhone2.value = '".$row[4]."';}";
        }
        mysqli_close($link);
        echo $fill;
    }
}

    
?>