<?php 

/**
 * This class handles the Back-end communication with the database.
 * @author Nick Foley
 */ 
class PopulateRooms {
    
    /**
     * This function puts all of the names inside of the drop-down menu.
    */
    public static function populateName(){
        
        require "code_camp_dbconnect.php";
        $sql = "SELECT room_name FROM room";
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
        $sql = "SELECT * FROM room";
        $result = $link->query($sql);
        
        //This variables generates the javascript to auto-fill the boxes
        $fill = "if ((roomNameDd.value == 0) || (roomNameDd.value == -1) ) {
                addOrEdit.textContent = 'Enter';
                editRoomBtns.style.display = 'none';
                addNewRoomBtns.style.display = '';
                if (roomNameDd.value == 0) {
                    roomNameDd.style.display = 'none';
                    roomName.style.display = '';
                }
            }";
            
        while ($row = mysqli_fetch_row($result)) {
                $fill = $fill . "else if(roomNameDd.value == '".$row[0]."'){
                    addOrEdit.textContent = 'Edit';
                    editRoomBtns.style.display = '';
                    addNewRoomBtns.style.display = 'none';
                    roomNameDd.style.display = 'none';
                    boxRoomName.style.display = '';
                    boxRoomName.value = '".$row[0]."';
                    roomCapacity.value = '".$row[1]."';}";
        }
        mysqli_close($link);
        echo $fill;
    }
}

    
?>