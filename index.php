<!DOCTYPE html>
<html lang="en">
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
  </head>

  <body>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>Race Name</h1>
		<div class="row">
		<div class="col-xs-2">
		<div class="panel panel-default" id="0">
		<div class="panel-body">
		<p>  </p>
		</div>
		</div>
		</div>
		<div class="col-xs-2">
		<div class="panel panel-default" id="1">
		<div class="panel-body">
		<p>  </p>
		</div>
		</div>
		</div>
		<div class="col-xs-2">
		<div class="panel panel-default">
		<div class="panel-body">
		<p>  </p>
		</div>
		</div>
		</div>
		<div class="col-xs-2">
		<div class="panel panel-default">
		<div class="panel-body">
		<p>  </p>
		</div>
		</div>
		</div>
		<div class="col-xs-2">
		<div class="panel panel-default">
		<div class="panel-body">
		<p > 1 </p>
		</div>
		</div>
		</div>
		</div>
		<div>
		<!--
		<input  id="box2" type="text" class="form-control" onkeypress="this.value=this.value.replace(/[^0-9]/, '')" autofocus/>
		-->
		</div>
	  </div>
    <footer class="footer">
      <div class="container">
        <p class="text-muted">Instructions.</p>
      </div>
    </footer>
	</div>

    <script>
        var cursor_position = 0;
		document.getElementById("1").innerHTML = "Paragraph changed.";
	</script>
	
    

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
