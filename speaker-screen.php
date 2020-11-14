<?php 
include('automation/PopulateSpeaker.php');
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Boston Code Camp Counter | Speaker</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="">
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
        <form id="speakerInformation" action = "RunSpeaker.php" method="POST">
            <table class="center">
                <tr>
                    <th class="tabHeader"><a href="room-screen.html">Room</a></th>
                    <th class="tabHeader" id="selected"><a href="speaker-screen.html">Speaker</a></th>
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
                                <td colspan="4" style="text-align: center;"><b>Speaker Information</b></td>
                            </tr>
                            <tr><td> </td></tr>
                            <tr id="speakerName" >
                                <td colspan="2" style="text-align: right;">Speaker Name: </td>
                                <td colspan="2">
                                    <select name="speakerName" id="ddSpeakerName" onchange='addOrEditFunc();'>
                                        <option value="0">&lt;Add New Speaker&gt;</option>
                                        <option value="testCase">Uncle Bob - bob@gmail.com</option>
                                        <option value="-1" selected="true"></option>
										<?php 
                                        PopulateSpeaker::populateName();
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr id="speakerFirstNameCell" style="display: none;">
                                <td colspan="2" style="text-align: right;">Speaker First Name: </td>
                                <td><input type="text" id="speakerFirstName" name="speakerFirstName"/></td>
                            </tr>
                            <tr id="speakerLastNameCell" style="display: none;" >
                                <td colspan="2" style="text-align: right;">Speaker Last Name: </td>
                                <td><input type="text" id="speakerLastName" name="speakerLastName" /></td>
                            </tr>
                            <tr><td> </td></tr>
                            <tr>
                                <td colspan="2" style="text-align: right;">Email: </td>
                                <td>
                                    <input type="email" id="speakerEmail" name="speakerEmail" />
                                </td>
                            </tr>
                            <tr><td> </td></tr>
                            <tr>
                                <td colspan="2" style="text-align: right;">Phone Number #1: </td>
                                <td>
                                    <input type="tel" id="speakerPhoneNum1" name="speakerPhoneNum1" />
                                </td>
                            </tr>
                            <tr><td> </td></tr>
                            <tr>
                                <td colspan="2" style="text-align: right;">Day of Phone Number: </td>
                                <td>
                                    <input type="tel" id="speakerDayOfPhoneNum" name="speakerDayOfPhoneNum" />
                                </td>
                            </tr>
                            <tr><td><br/> </td></tr>
                            <tr id="addNewSpeaker">
                                <td colspan="4" style="text-align: center;">
                                    <input type="submit" id="btnAdd" name="addSpeaker" value="Add" />
                                    &nbsp;
                                    <input type="button" id="btnClear" name="clearSpeaker" value="Clear" />
                                    &nbsp;
                                    <input type="button" id="btnExit" name="exitSpeaker" value="Exit" />
                                </td>
                            </tr>
                            <tr id="editNewSpeaker" style="display: none;">
                                <td colspan="4" style="text-align: center;">
                                    <input type="submit" id="btnSave" name="saveSpeaker" value="Save" />
                                    &nbsp;
                                    <input type="button" id="btnClear" name="clearSpeaker" value="Clear" />
                                    &nbsp;
                                    <input type="button" id="btnDelete" name="deleteSpeaker" value="Delete" />
                                    &nbsp;
                                    <input type="button" id="btnExit" name="exitSpeaker" value="Exit" />
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
            // finds the elements and sets as variables
            var addOrEdit = document.getElementById("addOrEdit");
            var addNewSpeakerBtns = document.getElementById("addNewSpeaker");
            var editNewSpeakerBtns = document.getElementById("editNewSpeaker");
            var speakerNameDd = document.getElementById("ddSpeakerName");
            var speakerName = document.getElementById("speakerName");
            var cellSpeakerFirstName = document.getElementById("speakerFirstNameCell");
            var cellSpeakerLastName = document.getElementById("speakerLastNameCell");
            var txtFirstName = document.getElementById("speakerFirstName");
            var txtLastName = document.getElementById("speakerLastName");
			var txtEmail = document.getElementById("speakerEmail");
			var txtPhone1 = document.getElementById("speakerPhoneNum1");
			var txtPhone2 = document.getElementById("speakerDayOfPhoneNum");
        
        function addOrEditFunc() {
            <?php PopulateSpeaker::populateBoxes(); ?>
        };

        window.onload = addOrEditFunc();
    </script>
</html>
