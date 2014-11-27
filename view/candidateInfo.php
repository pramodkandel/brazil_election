

<html>
    <head>
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script>
        <script language="javascript" type="text/javascript">
            $(document).ready(function(){
                $("#cand_btn").click(function(){
                    console.log("Clicked");
                    //this is all the data to send to php
                    var race = "Ice Cream";
                    var voterInput = "101";
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
        </script>
    </head>
    <body>
        
        <button id = "cand_btn">Get Candidates</button>
        <div id="retrieved">

        </div>
    </body>

</html>
