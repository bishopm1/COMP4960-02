<?php
include('automation/PopulateTimeslot.php');
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Boston Code Camp Counter | Time Slot</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="">
    </head>

    <nav id="navbar">
        <ul style="width:100%">
            <li style="float: left;" id="programName">Boston Code Camp</li>
            <li><a href="room-screen.php">Home</a></li>
            <li><a href="add-count.html">Add Counts</a></li>
            <li>
                <div class="dropdown">
                    <button class="dropdownbtn">Add/Edit Information</button>
                    <div class="dropdown-content">
                        <a href="room-screen.php">&nbsp;&nbsp;Room</a>
                        <a href="speaker-screen.php">&nbsp;&nbsp;Speaker</a>
                        <a href="timeslot-screen.php">&nbsp;&nbsp;Time Slot</a>
                        <a href="session-screen.php">&nbsp;&nbsp;Session</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>


    <body>
        <br /><br /><br /><br /><br /><br />
        <form id="speakerInformation" action="RunTimeSlot.php" method="POST">
            <table class="center">
                <tr>
                    <th class="tabHeader"><a href="room-screen.php">Room</a></th>
                    <th class="tabHeader"><a href="speaker-screen.php">Speaker</a></th>
                    <th class="tabHeader" id="selected" ><a href="timeslot-screen.php">Time Slot</a></th>
                    <th class="tabHeader"><a href="session-screen.php">Session</a></th>
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
                                <td colspan="4" style="text-align: center;"><b>Time Slot Information</b></td>
                            </tr>
                            <tr><td> </td></tr>
                            <tr id="timeSlot" >
                                <td colspan="2" style="text-align: right;">Time Slot: </td>
                                <td colspan="2">
                                    <select name="ddTimeSlot" id="ddTimeSlot" onchange='addOrEditFunc();'>
                                        <option value="-1" selected="true"></option>
                                        <option value="0">&lt;Add New Time Slot&gt;</option>
                                        <?php 
                                        PopulateTimeslot::populateTimes();
                                        ?>

                                    </select>
                                </td>
                            </tr>
                            <tr id="timeslotStartTimeCell" style="display: none;">
                                <td colspan="2" style="text-align: right;">Start Time: </td>
                                <td><input type="time" id="timeslotStartTime" name="timeslotStartTime"
                                	min = "1:00" max = "18:00" required/></td>
                            </tr>
                            <tr id="timeslotEndTimeCell" style="display: none;" >
                                <td colspan="2" style="text-align: right;">End Time: </td>
                                <td><input type="time" id="timeslotEndTime" name="timeslotEndTime"
                                	min = "1:01" max = "18:00" required/></td>
                            </tr>
                            <tr id="addNewTimeSlot">
                                <td colspan="4" style="text-align: center;">
                                    <input type="submit" id="btnAdd" name="addSpeaker" value="Add" />
                                    &emsp;&emsp;
                                    <input type="reset" id="btnClear" name="clearSpeaker" value="Clear" />
                                </td>
                            </tr>
                            <tr id="editNewTimeSlot" style="display: none;">
                                <td colspan="4" style="text-align: center;">
                                    <input type="submit" id="btnSave" name="saveSpeaker" value="Save" />
                                    &emsp;&emsp;
                                    <input type="reset" id="btnClear" name="clearSpeaker" value="Clear" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <input type="submit" id="action" name="action" value="Delete" style="float: left; margin-left: 10px; margin-bottom: 10px;" />
                                    <input type="button" Title="Exit" id="btnExit" name="exitSpeaker" onclick= "location.href = ('room-screen.php');" value="Exit" style="float: right; margin-right: 10px; margin-bottom: 10px;" />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </body>

    <script>
            var addOrEdit = document.getElementById("addOrEdit");
            var addNewTimeSlotBtns = document.getElementById("addNewTimeSlot");
            var editNewTimeSlotBtns = document.getElementById("editNewTimeSlot");
            var timeslotDd = document.getElementById("ddTimeSlot");
            var timeslot = document.getElementById("timeSlot");
            var cellTimeSlotStartTime = document.getElementById("timeslotStartTimeCell");
            var cellTimeSlotEndTime = document.getElementById("timeslotEndTimeCell");
            var txtStartTime = document.getElementById("timeslotStartTime");
            var txtEndTime = document.getElementById("timeslotEndTime");
        function addOrEditFunc() {
           
            <?php PopulateTimeslot::populateBoxes(); ?>
        }

        window.onload = addOrEditFunc();
    </script>

</html>