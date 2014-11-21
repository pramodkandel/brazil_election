<html>
    <head>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script>

    <script language="javascript" type="text/javascript">
    
    $(document).ready(function() {
        $("#friends_btn").click(function() {
            $.ajax({
                type: "POST",
                url: '../controller/fetch.php',
                data: "",
                //async: false,
                dataType: 'JSON',
                success: function(data)
                {
                    
                    for (var i = 0; i<data.length; i++)
                    {
                        var row = data[i];
                        var fName = row["FirstName"];
                        var lName = row["LastName"];
                        var age = row["Age"];
                        $("#friends").append(fName + " " + lName + " age:" + age+"</br>");
                    }
                    
                },
                error:function(xhr, ajaxOptions, thrownError){
                    $("#friends").append(xhr.status);
                    $("#friends").append(thrownError);
                }
            });

        });
    });

    </script>
    </head>
		<body>
			<button id="friends_btn" value="Fetch friends">Friends</button>
			<div id='friends'>

			</div>
    </body>
    
</html>



