<?php 
include('automation/PopulateSession.php');

include('automation/PopulateSpeaker.php');

include('automation/PopulateRooms.php');

include('automation/PopulateTimeslot.php');
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Boston Code Camp Counter | Session</title>
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
        <form id="sessionInformation" action="RunSession.php" method="POST">
            <table class="center">
                <tr>
                    <th class="tabHeader"><a href="room-screen.php">Room</a></th>
                    <th class="tabHeader"><a href="speaker-screen.php">Speaker</a></th>
                    <th class="tabHeader"><a href="timeslot-screen.php">Time Slot</a></th>
                    <th class="tabHeader" id="selected"><a href="session-screen.php">Session</a></th>
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
                                <td colspan="4" style="text-align: center;"><b>Session Information</b></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;">Session Name: </td>
                                <td colspan="2">
                                    <select name="ddSessionName" id="ddSessionName" onchange='addOrEditFunc();'>
                                        <option value="-1" selected="true"></option>
                                        <option value="0">&lt;Add New Session&gt;</option>
										<?php 
                                        PopulateSession::populateName();
                                        ?>
                                    </select>
                                    <input type="text" id="boxSessionName" name="boxSessionName" style="display: none;"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;">Speaker Name: </td>
                                <td colspan="2">
                                    <select name="ddSpeakerName" id="ddSpeakerName" onchange='addFunc();'>
                                        <option value="-1" selected="true"></option>
                                        <option value="0">&lt;Create New Speaker&gt;</option>
										<?php 
                                        PopulateSpeaker::populateName();
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;">Time Slot: </td>
                                <td colspan="2">
                                    <select name="ddTimeSlot" id="ddTimeSlot" onchange='addFunc();'>
                                        <option value="-1" selected="true"></option>
                                        <option value="0">&lt;Create New Time Slot&gt;</option>
										<?php 
                                        PopulateTimeslot::populateTimes();
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;">Room Name: </td>
                                <td colspan="2">
                                    <select name="ddRoomName" id="ddRoomName" onchange='addFunc();'>
                                        <option value="-1" selected="true"></option>
                                        <option value="0">&lt;Create New Room&gt;</option>
										<?php 
                                        PopulateRooms::populateName();
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr><td> </td></tr>
                            <tr id="addNewSession">
                                <td colspan="4" style="text-align: center;">
                                    <input type="submit" id="btnAdd" name="addSpeaker" value="Add" />
                                    &emsp;&emsp;
                                    <input type="reset" id="btnClear" name="clearSpeaker" value="Clear" />
                                </td>
                            </tr>
                            <tr id="editSession" style="display: none;">
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
        var addNewSessionBtns = document.getElementById("addNewSession");
        var editSessionBtns = document.getElementById("editSession");
        var sessionNameDd = document.getElementById("ddSessionName");
        var speakerNameDd = document.getElementById("ddSpeakerName");
        var roomNameDd = document.getElementById("ddRoomName");
        var timeSlotDd = document.getElementById("ddTimeSlot");
        var sessionName = document.getElementById("boxSessionName");
        
        function addOrEditFunc() {
            <?php PopulateSession::populateBoxes(); ?>
        };
        
        function addFunc() {
        if (speakerNameDd.value == 0) {
            window.location.replace("speaker-screen.php");
        }
        if (roomNameDd.value == 0) {
            window.location.replace("room-screen.php");
        }
        if (timeSlotDd.value == 0) {
            window.location.replace("timeslot-screen.php");
        }
    };

        window.onload = addOrEditFunc();
    </script>
</html>
