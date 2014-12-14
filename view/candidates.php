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
        <script src="js/jquery-min.js"></script>
		<script language="javascript" type="text/javascript">
			$(document).ready(function(){
				loadCandidates();
			});
			
			//taken from stackoverflow
			function shuffle(array) {
				var currentIndex = array.length, temporaryValue, randomIndex ;

				  // While there remain elements to shuffle...
				while (0 !== currentIndex) {

					// Pick a remaining element...
					randomIndex = Math.floor(Math.random() * currentIndex);
					currentIndex -= 1;

					// And swap it with the current element.
					temporaryValue = array[currentIndex];
					array[currentIndex] = array[randomIndex];
					array[randomIndex] = temporaryValue;
				}

				return array;
			}
				
			function parse_search_data(data){
                    console.log("Inside parse_search_data")
					var html_str = "";
					
					//create index array from 0 to data length-1 to shuffle
					var index_array = new Array();
					for (var i=0; i<data.length; i++){
						index_array.push(i);
					}
				
					pi = shuffle(index_array);
					html_str = "";
					for (var i = 0; i<data.length; i++)
					{
						var row = data[pi[i]];
						//var row = data[i];
						var partyName = row["PartyName"];
						var partyNum = row["PartyNumber"];
						var partyImgSrc = row["PartyImageSrc"];
						var candName = row["CandidateName"];
						var candNum = row["CandidateNumber"];
						var imgSrc = row["ImageSrc"];
						var race = row["Race"];
						var imgHtml = "<img src='"+imgSrc+"'> </img>";
						html_str += "<div class='col-xs-4 candidateVisible' style='width:245px;height:150px'" + 
													"id='search_result"+i.toString()+"'> " +
													"<img src='" + imgSrc + "' style='width:70px;height:70px'>" + 
													"<h4> " + candName + "</h4>" +
													"<h4 id='search_result_candNum"+i.toString()+"'>" + candNum + "</h4>" +
												"</div>";
					}
					
																
                    return html_str;
				}
			
			function loadCandidates(){
				data = {"Race":"Burger", "VoterInput":""};
				$.ajax({
					type: "POST",
					url: '../controller/query_candidates.php',
					data: data,
					dataType: 'JSON',
					async:false,
					success: function(data)
					{
						$("#search_results").html(""); //remove any data currently in search_results div
						var html_str = parse_search_data(data);
						$("#search_results").append(html_str);
					},
					error: function()
					{
						$("#search_results").append("ERROR");
					}
                }); 
			
			}
			
		</script>
    </head>
    <body>

		<div class="row" id="search_results" style="height: 600px">
			<!--  only display if search button pressed, check State-->
		</div>
 
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../bootstrap-3.3.1/assets/js/ie10-viewport-bug-workaround.js"></script>

    </body>

</html>
