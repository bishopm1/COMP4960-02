<?php 
include('automation/PopulateRooms.php');
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Boston Code Camp Counter | Room</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    </head>

    <nav id="navbar">
        <ul style="width:100%">
            <li style="float: left;" id="programName">Boston Code Camp</li>
            <li><a href="">Home</a></li>
            <li><a href="">Add Counts</a></li>
            <li>
                <div class="dropdown">
                    <button class="dropdownbtn">Add/Edit Information</button>
                    <div class="dropdown-content">
                        <a href="room-screen.html">&nbsp;&nbsp;Room</a>
                        <a href="speaker-screen.html">&nbsp;&nbsp;Speaker</a>
                        <a href="timeslot-screen.html">&nbsp;&nbsp;Time Slot</a>
                        <a href="session-screen.html">&nbsp;&nbsp;Session</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>

    <body>
        <br /><br /><br /><br /><br /><br />
        <form id="speakerInformation" action="RunRoom.php" method="POST">
            <table class="center">
                <tr>
                    <th class="tabHeader" id="selected" ><a href="room-screen.html">Room</a></th>
                    <th class="tabHeader"><a href="speaker-screen.html">Speaker</a></th>
                    <th class="tabHeader"><a href="timeslot-screen.html">Time Slot</a></th>
                    <th class="tabHeader"><a href="session-screen.html">Session</a></th>
                </tr>
                <tr>
                    <td colspan="4" style="width: 100%;">
                        <table id="infoBody">
                            <tr>
                                <td colspan="4" style="text-align: center;">
                                    <label id="addOrEdit" style="font-weight: bold;"></label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: center;"><b>Room Information</b></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;">Room Name: </td>
                                <td colspan="2">
                                    <select name="ddRoomName" id="ddRoomName" onchange='addOrEditFunc();'>
                                        <option value="-1" selected="true"></option>
                                        <option value="0">&lt;Add New Room&gt;</option>
                                        <?php 
                                        PopulateRooms::populateName();
                                        ?>
                                    </select>
                                    <input type="text" id="boxRoomName" name="boxRoomName" style="display: none;"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;">Room Capacity: </td>
                                <td>
                                    <input type="text" id= "roomCapacity" name="roomCapacity" />
                                </td>
                            </tr>
                            <tr><td><br/> </td></tr>
                            <tr id="addNewRoom">
                                <td colspan="4" style="text-align: center;">
                                    <input type="submit" id="btnAdd" name="addRoom" value="Add" />
                                    &nbsp;
                                    <input type="button" id="btnClear" name="clearRoom" value="Clear" />
                                    &nbsp;
                                    <input type="button" id="btnExit" name="exitRoom" value="Exit" />
                                </td>
                            </tr>


                            <tr id="editRoom" style="display: none;">



                                <td colspan="4" style="text-align: center;">
                                    <input type="submit" id="btnSave" name="saveRoom" value="Save" />
                                    &nbsp;
                                    <input type="button" id="btnClear" name="clearRoom" value="Clear" />
                                    &nbsp;
                                    <input type="button" id="btnDelete" name="deleteRoom" value="Delete"/>
                                    &nbsp;
                                    <input type="button" id="btnExit" name="exitRoom" value="Exit" />
                                </td>
                            </tr>
                            <tr><td><br /> </td></tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </body>
    <script>
        var addOrEdit = document.getElementById("addOrEdit");
        var addNewRoomBtns = document.getElementById("addNewRoom");
        var editRoomBtns = document.getElementById("editRoom");
        var roomNameDd = document.getElementById("ddRoomName");
        var roomName = document.getElementById("boxRoomName");
        
        function addOrEditFunc() {
            <?php PopulateRooms::populateBoxes(); ?>
        };

        window.onload = addOrEditFunc();
    </script>
</html>
