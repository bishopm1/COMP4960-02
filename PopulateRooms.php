<?php 

class PopulateRooms {
    
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
    
    public static function populateCapacity($roomName){
        require "code_camp_dbconnect.php";
    
        $sql = "SELECT capacity FROM room WHERE room_name = '". $roomName. "'";
    
        $result = $link->query($sql);
        $options = "";
    
        while ($row = mysqli_fetch_row($result)) {
            $options = $row[0];
     
        }
        echo $options;
        mysqli_close($link);
    }
}

    
?>