<?php 

/**
 * This class handles the Back-end communication with the database.
 * @author Nick Foley
 */ 
class PopulateTimeslot {
    
    /**
     * This function puts all of the names inside of the drop-down menu.
    */
    public static function populateTimes(){
        
        require "code_camp_dbconnect.php";
        $sql = "SELECT * FROM timeslot";
		$sql2 = "SELECT end_time FROM timeslot";
        $result = $link->query($sql);
        
        $options = "";
    
        while ($row = mysqli_fetch_row($result)) {
            $options = $options . "<option value='".$row[2]."'>" .date("g:i a", strtotime($row[0])) ." - ".date("g:i a", strtotime($row[1]))."</option>";
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
        $sql = "SELECT * FROM timeslot";
        $result = $link->query($sql);
        
        //This variables generates the javascript to auto-fill the boxes
        $fill = "if ((timeslotDd.value == 0) || (timeslotDd.value == -1) ) {
                addOrEdit.textContent = 'Enter';
                editNewTimeSlotBtns.style.display = 'none';
                addNewTimeSlotBtns.style.display = '';
                if (timeslotDd.value == 0) {
                    timeslotDd.style.display = 'none';
                    timeslot.style.display = 'none'
                    cellTimeSlotStartTime.style.display = '';
                    cellTimeSlotEndTime.style.display = '';
                }
            }";
            
        while ($row = mysqli_fetch_row($result)) {
                $fill = $fill . "else if(timeslotDd.value == '".$row[2]."'){
                addOrEdit.textContent = 'Edit';
                editNewTimeSlotBtns.style.display = '';
                addNewTimeSlotBtns.style.display = 'none';
                timeslotDd.style.display = 'none';
                timeslot.style.display = 'none'
                cellTimeSlotStartTime.style.display = '';
                cellTimeSlotEndTime.style.display = '';
                txtStartTime.defaultValue = '".$row[0]."';
                txtEndTime.defaultValue = '".$row[1]."';
                
            }";
        }
        mysqli_close($link);
        echo $fill;
    }
}


    
?>