<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Voting Machine</title>

        <!-- Bootstrap core CSS -->
        <link href="../bootstrap-3.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="voting.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../bootstrap-3.3.1/assets/js/ie-emulation-modes-warning.js">
        </script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- <script src="./script/number_click.js"> </script> -->
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script>
        <script language="javascript" type="text/javascript">
            var stateModule = (function () {
                var state = {}; // Private Variable
                    state["cursor_position"] = 0;
                    state["events_stack"] = new Array();
                    state["vote_input"] = "";
                    state["race_name"] = "Ice Cream";
                    // Party Info: whether party exists, party name, party num, party pic, party alt text
                    state["party_info"] = [false, "Angry party", "94", "angry.jpg", "Angry Candidate"];
                    // Candidate Info: whether candidate exists, candidate name, candidate num, candidate pic
                    state["candidate_info"] = [false, "Mario", "94700", "candidate.jpg"];
                var pub = {};// public object - returned at end of module
                pub.changeState = function (state_key, new_state_value) {
                    state[state_key] = new_state_value;
                };
                pub.getState = function(state_key) {
                    return state[state_key];
                }
                pub.getStates = function() {
                    return state;
                }
                return pub; // expose externally
            }());
            stateModule.changeState("cursor_position", "0");
            $(document).ready(function(){
                function number_press(num_str) {
                    var theState = stateModule.getStates();
                    $("#box".concat(theState["cursor_position"])).append(num_str);
                    stateModule.changeState("cursor_position", (parseInt(theState["cursor_position"])+1).toString());
                    theState["events_stack"].push("keypadnumber"+num_str);
                    console.log(theState);
                    udpate_view();                    
                }
                $("#keypadnumber1").click(function(){
                    number_press("1");
                });
                $("#keypadnumber2").click(function(){
                    number_press("2");
                });
                $("#keypadnumber3").click(function(){
                    number_press("3");
                });
                $("#keypadnumber4").click(function(){
                    number_press("4");
                });
                $("#keypadnumber4").click(function(){
                    number_press("4");
                });
                $("#keypadnumber5").click(function(){
                    number_press("5");
                });
                $("#keypadnumber6").click(function(){
                    number_press("6");
                });
                $("#keypadnumber7").click(function(){
                    number_press("7");
                });
                $("#keypadnumber8").click(function(){
                    number_press("8");
                });
                $("#keypadnumber9").click(function(){
                    number_press("9");
                });
                $("#keypadnumber0").click(function(){
                    number_press("0");
                });
                $("#keypadUndo").click(function(){
                    var theState = stateModule.getStates();
                    var lastEvent = theState["events_stack"].pop();  
                    stateModule.changeState("events_stack", theState["events_stack"]);
                    if (startsWith(lastEvent, "keypadnumber")) {
                        stateModule.changeState("cursor_position", (parseInt(theState["cursor_position"])-1).toString());
                        cursor_position = stateModule.getState("cursor_position");
                        $("#box".concat(cursor_position)).html("");
                    } 
                    console.log(theState);
                    udpate_view();
                });
                function udpate_view() {
                    cursor_position = parseInt(stateModule.getState("cursor_position"));
                    var voterInput = getVoterInput(cursor_position);
                    // Displaying Party Info
                    if (parseInt(stateModule.getState("cursor_position")) >= 2) { // if party selected
                        var party_info = stateModule.getState("party_info");
                        if (party_info[0]) { // party exists
                            var party_selected_str =    "<div class='col-xs-2'>" + 
                                                        "<img src= "+ party_info[3] + " alt= " + party_info[4] + "style='width:100px;height:100px'>" +
                                                    "</div>" + 
                                                    "<div class='col-xs-4'>" +
                                                        "<h3> Party name: " + party_info[1] + " </h3>" + 
                                                    "</div>" +
                                                    "<div class='col-xs-4'>" +
                                                        "<h3> Party number: " + party_info[2] + "</h3>" +
                                                    "</div>";
                            $("#party_selected").html(party_selected_str);
                        } else { // party does not exist
                            var no_party_str = "<div class='alert alert-danger' role='alert'>" + 
                                                    "No PARTY with this number!" + 
                                                "</div>";
                            $("#party_selected").html(no_party_str);
                        }
                    } else { // if party not selected
                        $("#party_selected").html("");
                    }
                    // Displaying Candidates Info
                    if (parseInt(stateModule.getState("cursor_position")) == 5) { // if candidate selected
                        var candidate_info = stateModule.getState("candidate_info");
                        if (candidate_info[0]) { // candidate exists
                            var candidate_selected_str =    "<div class='col-xs-2'>" + 
                                                        "<img src= "+ candidate_info[3] + " style='width:100px;height:100px'>" +
                                                    "</div>" + 
                                                    "<div class='col-xs-4'>" +
                                                        "<h3> Candidate name: " + candidate_info[1] + " </h3>" + 
                                                    "</div>" +
                                                    "<div class='col-xs-4'>" +
                                                        "<h3> Candidate number: " + candidate_info[2] + "</h3>" +
                                                    "</div>";
                            $("#candidate_selected").html(candidate_selected_str);
                        } else { // candidate does not exist
                            var no_candidate_str = "<div class='alert alert-danger' role='alert'>" + 
                                                    "No CANDIDATE with this number!" + 
                                                "</div>";
                            $("#candidate_selected").html(no_candidate_str);
                        }
                    } else { // if candidate not selected
                        $("#candidate_selected").html("");
                    }
                    // Possibly Shading Search Results
                    // TODO
                }
                $("#keypadSearch").click(function(){
                    console.log("Clicked keypadSearch");
                    cursor_position = parseInt(stateModule.getState("cursor_position"));
                    var race = stateModule.getState("race_name");
                    var voterInput = getVoterInput(cursor_position);
                    console.log("voterInput" + voterInput);
                    if (parseInt(stateModule.getState("cursor_position")) < 2) { //party search 

                    } else { // candidate search

                    }
                    //this is all the data to send to php
                    $("#retrieved").append("<p> This is for the race '" + race + "' and voter input '"+voterInput +"'. If you want to query for other things, open view/candidateInfo.php and change the variables 'race' and 'voterInput'. To add rows in database, go to https://sql.scripts.mit.edu/phpMyAdmin/ and type 'pramod' as both username and password and add to database 'pramod+friends' in table 'candidates'.</p>");
                    data = {"Race":race, "VoterInput":voterInput}; 
                    $.ajax({
                        type: "POST",
                        url: '../controller/query_candidates.php',
                        data: data,
                        dataType: 'JSON',
                        success: function(data)
                        {
                            for (var i = 0; i<data.length; i++)
                            {
                                var row = data[i];
                                var partyName = row["PartyName"];
                                var partyNum = row["PartyNumber"];
                                var candName = row["CandidateName"];
                                var candNum = row["CandidateNumber"];
                                var imgSrc = row["ImageSrc"];
                                var race = row["Race"];

                                var imgHtml = "<img src='"+imgSrc+"'> </img>";

                                $("#retrieved").append("Race: "+race+", Party Name: "+partyName+ ", Party Number: "+partyNum+", Candidate Name: "+candName+", Candidate Number: "+candNum+"</br>"+imgHtml + "</br></br>");
                            }
                        },
                        error: function()
                        {
                            $("#retrieved").append("ERROR");
                        }
                    });
                });
            });
            function startsWith(str, prefix) {
                return str.lastIndexOf(prefix, 0) === 0;
            }
            function getVoterInput(cursor_position) {
                var voterInput = "";
                for (i = 0; i < cursor_position; i++) {
                    voterInput += $("#box".concat(i.toString())).text();
                }
                voterInput = voterInput.replace(/\D/g,'');  // trim away any non digits
                return voterInput;
            }
        </script>
    </head>
    <body>
        <!-- Begin page content -->
        <div class="container" style="width:1000px;">
            <div class="row" style="max-width:1000px;">
                <div class="col-xs-12" style="max-width:680px;">
                    <div class="container">
                        <div class="page-header">
                            <h1>Race Name</h1>
                            <div class="row">
                                <div class="col-xs-2">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <p id="box0">  </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <p id="box1">  </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <p id="box2" >  </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <p id="box3">  </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <p id="box4">  </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="party_selected">
                                <!-- only display if single party option-->
                            </div>
                            <div class="row" id="candidate_selected">
                                <!-- only display if single candidate option-->
                            </div>
                            <div></div>
                        </div>

                        <div class="row" style="border:solid; border-width:2px">
                            <div id="retrieved"> </div>
                            <!-- TODO only display if search button pressed, check State-->
                            <div class="col-xs-4" id="candidateHidden">
                                <img src="candidate.jpg" style="width:100px;height:95px">
                                <h3> Party name</h3>
                                <h3> Candidate number</h3>
                            </div>
                            <div class="col-xs-4" id="candidateVisible">
                                <img src="candidate.jpg" style="width:100px;height:95px">
                                <h3> Candidate name</h3>
                                <h3> Candidate number</h3>
                            </div>
                            <div class="col-xs-4" id="candidateHidden">
                                <img src="candidate.jpg" style="width:100px;height:95px;">
                                <h3> Candidate name</h3>
                                <h3> Candidate number</h3>
                            </div>
                            <div class="col-xs-4" id="candidateVisible">
                                <img src="candidate.jpg" style="width:100px;height:95px;">
                                <h3> Candidate name</h3>
                                <h3> Candidate number</h3>
                            </div>
                            <div class="col-xs-4" id="candidateHidden">
                                <img src="candidate.jpg"  style="width:100px;height:95px;">
                                <h3> Candidate name</h3>
                                <h3> Candidate number</h3>
                            </div>
                            <div class="col-xs-4" id="candidateHidden">
                                <img src="candidate.jpg"  style="width:100px;height:95px;">
                                <h3> Candidate name</h3>
                                <h3> Candidate number</h3>
                            </div>
                        <footer class="footer">
                            <p class="text-muted">
                                Press Confirm to cast vote <br> Press Search to filter only the relevant result</br>
                            </p>
                        </footer>

                    </div>
                </div> 
            </div>
            <div class="col-xs-4" style="width:320px;height:400px">
                <div class="row" style="width:320px;height:220px">
                    <div class="col-xs-1"> </div>
                    <div class="col-xs-1"> </div>
                    <div class="col-xs-1"> </div>
                </div>
                <div class="container" style="border:solid;border-width:2px; width:300px;">
                <div class="row" style="height:75px;margin-top:20px;">
                    <div class="col-xs-3" style="width:320px; margin-left: 50px">  
                        <div class="btn-group-horizontal" role="group">
                            <button type="button" class="btn btn-default btn-lg" id="keypadnumber1">1</button>
                            <button type="button" class="btn btn-default btn-lg" id="keypadnumber2">2</button>
                            <button type="button" class="btn btn-default btn-lg" id="keypadnumber3">3</button>
                        </div>
                    </div>
                </div>
                <div class="row" style="height:75px">
                    <div class="col-xs-3" style="width:320px; margin-left: 50px">
                        <div class="btn-group-horizontal" role="group">
                            <button type="button" class="btn btn-default btn-lg" id="keypadnumber4">4</button>
                            <button type="button" class="btn btn-default btn-lg" id="keypadnumber5">5</button>
                            <button type="button" class="btn btn-default btn-lg" id="keypadnumber6">6</button>
                        </div>
                    </div>
                </div>
                <div class="row" style="height:75px">
                    <div class="col-xs-3" style="width:320px; margin-left: 50px">
                        <div class="btn-group-horizontal" role="group">
                            <button type="button" class="btn btn-default btn-lg" id="keypadnumber7">7</button>
                            <button type="button" class="btn btn-default btn-lg" id="keypadnumber8">8</button>
                            <button type="button" class="btn btn-default btn-lg" id="keypadnumber8">9</button>
                        </div>
                    </div>
                </div>
                <div class="row" style="height:75px">
                    <div class="col-xs-3" style="width:320px;margin-left: 50px">
                        <div class="btn-group-horizontal" role="group">
                            <button type="button" class="btn btn-default btn-lg" id="keypad*">*</button>
                            <button type="button" class="btn btn-default btn-lg" id="keypadnumber0">0</button>
                            <button type="button" class="btn btn-default btn-lg" id="keypad#">#</button>
                        </div>
                    </div>
                </div>
                <div class="row" style="height:75px">
                    <div class="col-xs-3" style="width:320px">
                        <div class="btn-group-horizontal" role="group">
                            <button type="button" class="btn btn-default btn-lg" style="background-color:blue; color:white" id="keypadSearch">Search</button>
                            <button type="button" class="btn btn-default btn-lg" style="background-color:orange; color:black" id="keypadUndo">Undo</button>
                            <button type="button" class="btn btn-default btn-lg" style="background-color:green; color:white"  id="keypadConfirm">Confirm</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../bootstrap-3.3.1/assets/js/ie10-viewport-bug-workaround.js"></script>

    </body>

</html>
