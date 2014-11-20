<html>
    <head>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script>

    <script language="javascript" type="text/javascript">
    $("#friends_btn").click(function() {
        $.ajax({
            url: 'fetch.php',
            data: "",
            dataType: 'json',
            success: function(data)
            {
                var fName = data[0];
                var lName = data[1];
                var age = data[2];
                $("#friends").html(fName + " " + lName + " age:" + age);
            }
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



