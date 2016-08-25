<!doctype html>
<html>
    <head
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> <?= htmlspecialchars($title) ?></title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="mystyles.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]> --->
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/login.js"></script>    
</head>


<body style="padding-top: 70px; background-color:#000000">
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topFixedNavbar1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="index.php">CS75 Market Place</a></div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="topFixedNavbar1" style="max-width:1200px; align-content:center">
      <ul class="nav navbar-nav">
        <li <?= $_GET["page"]=="lookup" ? 'class="active"' : ''; ?>><a href="index.php?page=lookup">LookUp</a></li>
          
          
        <li <?= $_GET["page"]=="portfolio" ? 'class="active"' : ''; ?>><a href="index.php?page=portfolio">Portfolio</a></li>
        </ul>
      
      <ul class="nav navbar-nav navbar-right">
          
        <form class="navbar-form navbar-left" method="POST" action="index.php?page=login" id="login">
        <div class="form-group">
        	<input type="text" class="form-control" placeholder="User Email" name="email" data-toggle="tooltip" data-placement="bottom" title="please provide email as :##@##.##">
        	<input class="form-control" placeholder="Password" type="password" name="password">
        </div> 
        <button type="submit" class="btn btn-default">Sign In</button>
      </form>
          
      </ul>
      
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>