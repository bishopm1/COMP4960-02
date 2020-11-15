<?php 

/**
 * This class handles the Back-end communication with the database.
 * @author Matt Bishop
 */ 
class PopulateSession {
    
    /**
     * This function puts all of the names inside of the drop-down menu.
    */
    public static function populateName(){
        
        require "code_camp_dbconnect.php";
        $sql = "SELECT topic FROM session";
        $result = $link->query($sql);
        
        $options = "";
    
        while ($row = mysqli_fetch_row($result)) {
            $options = $options . "<option value='".$row[0]."'>" .$row[0] ."</option>";
        }
        echo $options;
        mysqli_close($link);
    }
    
    /**
     * This function handles filling in the boxes when clicking on an option of
     * the drop-down menu.
    */
    public static function populateBoxes(){
        
        require "code_camp_dbconnect.php";
        $sql = "SELECT * FROM session";
        $result = $link->query($sql);
        
        //This variables generates the javascript to auto-fill the boxes
        $fill = "if ((sessionNameDd.value == 0) || (sessionNameDd.value == -1) ) {
                addOrEdit.textContent = 'Enter';
                editSessionBtns.style.display = 'none';
                addNewSessionBtns.style.display = '';
                if (sessionNameDd.value == 0) {
                    sessionNameDd.style.display = 'none';
                    sessionName.style.display = '';
                }
            }";
            
        while ($row = mysqli_fetch_row($result)) {
                $fill = $fill . "else if(sessionNameDd.value == '".$row[0]."'){
                    addOrEdit.textContent = 'Edit';
                    editSessionBtns.style.display = '';
                    addNewSessionBtns.style.display = 'none';
                    sessionNameDd.style.display = 'none';
                    sessionName.style.display = '';
                    sessionName.value = '".$row[0]."';
                    speakerNameDd.value = '".$row[1]."';
					timeSlotDd.value = '".$row[2]."';
					roomNameDd.value = '".$row[3]."';}";
        }
        mysqli_close($link);
        echo $fill;
    }
}

    
?>