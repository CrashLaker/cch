
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>CCH</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

	<style>
	body {
  padding-top: 70px;
  padding-bottom: 30px;
}

.theme-dropdown .dropdown-menu {
  position: static;
  display: block;
  margin-bottom: 20px;
}

.theme-showcase > p > .btn {
  margin: 5px 0;
}

.theme-showcase .navbar .container {
  width: auto;
}
.panel-info{border-color:#1E90FF;}
.panel-default{border-color:#808080;}
.panel-warning{border-color:#DBB84D;}
table {width:100%;table-layout:fixed;}
td{padding:5px;vertical-align:top;}
#export-tb td:nth-child(1){width:400px;}
#flag-tb td:nth-child(1){width:400px;}
#export-tb td:nth-child(3){width:40px;vertical-align:middle;}
#export-tb td:nth-child(4){width:40px;vertical-align:middle;}
#flag-tb td:nth-child(3){width:40px;vertical-align:middle;}
#flag-tb td:nth-child(4){width:40px;vertical-align:middle;}
textarea{width:100%;min-height:20px;overflow:hidden;border-radius:4px;webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);border: 1px solid #ccc;   transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s; box-shadow: inset 0 1px 1px rgba(0,0,0,.075);-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;}


#module-tb td:nth-child(2){width:40px;vertical-align:middle;}
#module-tb td:nth-child(3){width:40px;vertical-align:middle;}
.icons{cursor:pointer;width:23px;height:23px;vertical-align:bottom;}
	</style>
  </head>

  <body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Crash Compiler Helper!</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <!--<li><a href="#about">About</a></li>-->
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Load File<span class="caret"></span></a>
              <ul id="lists" class="dropdown-menu">
                <?php
					$file = file("list.txt");
					foreach($file as $val)
						echo "<li><a href=\"javascript:loadFile('$val');\">$val</a></li>";
				?>
				<!--<li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <!--<li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>-->
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
	  <form method="post" action="lol.php">
        <h3>Compiler helper!</h3>
        <p>Website created to help you compile your software.</p>
		<div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><b>Software</b></h3>
            </div>
            <div class="panel-body">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Name</span>
					<input type="text" name="name" class="form-control" onchange="masterchange();" placeholder="Name" aria-describedby="basic-addon1">
				</div>
				<div style="height:5px;clear:both;"></div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">CMD</span>
					<input type="text" class="form-control" name="cmdline" onchange="masterchange();" placeholder="Command-Line" aria-describedby="basic-addon1">
				</div>
            </div>
          </div>
		  <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><b>Modules</b> 
				<img onclick="addModule(1);" style="cursor:pointer;width:23px;height:23px;vertical-align:bottom;" src="add.png"/>
				</h3>
            </div>
            <div class="panel-body">
				<table id="module-tb" class="ismodule">
					<tr>
						<td>
						<div class="input-group">
						  <span class="input-group-addon">
							<input checked onchange="masterchange();" type="checkbox" aria-label="..." name="module-input-check[]">
						  </span>
						  <input type="text" onchange="masterchange();" class="form-control" aria-label="..." name="module-input-text[]">
						</div><!-- /input-group -->
						</td>
						<td><img onclick="copyModule(this);" class="icons" src="copy.png"/></td>
						<td><img onclick="destroyTR(this);" class="icons" src="trash.png"/></td>
					</tr>
				</table>
				
            </div>
          </div>
		  <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><b>Exports</b>
			  <img onclick="addExport(1);" style="cursor:pointer;width:23px;height:23px;vertical-align:bottom;" src="add.png"/>
			  </h3>
            </div>
            <div class="panel-body">
				<table id="export-tb" class="isexport">
					<tr>
						<td>
						<div class="input-group">
						  <span class="input-group-addon">
							<input checked onchange="masterchange();" type="checkbox" aria-label="..." name="export-input-check[]">
						  </span>
						  <input onchange="masterchange();" type="text" class="form-control" aria-label="..." name="export-input-text[]">
						</div><!-- /input-group -->
						</td>
						<td>
							<textarea onchange="masterchange();" class="form-control" style="height:34px;" name="export-text[]"></textarea>
						</td>
						<td><img onclick="copyExport(this);" class="icons" src="copy.png"/></td>
						<td><img onclick="destroyTR(this);" class="icons" src="trash.png"/></td>
					</tr>
				</table>
				
            </div>
          </div>
		  <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title"><b>Flags</b>
			  <img onclick="addFlag(1);" style="cursor:pointer;width:23px;height:23px;vertical-align:bottom;" src="add.png"/>
			  </h3>
            </div>
            <div class="panel-body">
				<table id="flag-tb" class="isflag">
					<tr>
						<td>
						<div class="input-group">
						  <span class="input-group-addon">
							<input checked onchange="masterchange();" type="checkbox" aria-label="..." name="flag-input-check0">
						  </span>
						  <input onchange="masterchange();" type="text" name="flag-input-text[]"class="form-control" aria-label="...">
						</div><!-- /input-group -->
						</td>
						<td>
							<textarea onchange="masterchange();" name="flag-text[]" class="form-control" style="height:34px;"></textarea>
						</td>
						<td><img onclick="copyFlag(this);" style="cursor:pointer;width:23px;height:23px;vertical-align:bottom;" src="copy.png"/></td>
						<td><img onclick="destroyTR(this);" class="icons" src="trash.png"/></td>
					</tr>
				</table>
            </div>
          </div>
		  <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title"><b>Result</b></h3>
            </div>
            <div class="panel-body">
				<textarea id="result" class="form-control" style="min-height:300px;"></textarea>
            </div>
          </div>
		  
		  
		  <button type="button" class="btn btn-lg btn-success" onclick="masterchange();">Save</button>
		  <button type="button" class="btn btn-lg btn-success" onclick="masterchange(1);"><img width=18 src="fork.png"/> Fork</button>
		  </form>
	  </div>


    </div> <!-- /container -->

	<!--<div style="width:100%;min-height:400px;margin:auto;" id="verbose">lol</div>-->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
	<script src="func.js"></script>
	<script src='jquery.textarea_autosize.js'></script>
	<script>
		//$('textarea').textareaAutoSize();
	</script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>
