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
      <a class="navbar-brand" href="index.php">CS75 Market Place</a>
      </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="topFixedNavbar1" style="max-width:1200px; align-content:center">
      <ul class="nav navbar-nav">
        <li <?= $_GET["page"]=="lookup" ? 'class="active"' : ''; ?>><a href="index.php?page=lookup">LookUp</a></li>
          
          
        <li <?= $_GET["page"]=="portfolio" ? 'class="active"' : ''; ?>><a href="index.php?page=portfolio">Portfolio</a></li>
        <li><a href="#" data-toggle="modal" data-target="#myModal">About the Project</a></li>
        <li> <a href="../../../index.php#portfolio">Back to Portfolio</a></li>
        </ul>
      
      <ul class="nav navbar-nav navbar-right">
          <? if (isset($_SESSION['userid'])){ echo $userid;?>
               <li style="text-transform: capitalize;"><a href="#">Hi: <?= $_SESSION['fname'].' '.$_SESSION['lname'] ?></a></li>
               <li><a href="#">Wallet: <?= $_SESSION['wallet'];?>$</a></li>
        </ul>
                  
          <? } else { echo $userid; ?>
        <form style="display=none" class="navbar-form navbar-left" method="POST" action="index.php?page=login" id="login"  >
        <div class="form-group">
        	<input type="text" class="form-control" placeholder="User Email" name="email" data-toggle="tooltip" data-placement="bottom" title="please provide email as :##@##.##">
        	<input class="form-control" placeholder="Password" type="password" name="password">
        </div> 
        <button type="submit" class="btn btn-default">Sign In</button>
      </form>
          </ul>
            <? } ?>
      
      
    
    <!-- /.navbar-collapse -->
  </div>
	</div>
  <!-- /.container-fluid -->
</nav>






<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">About This Project</h4>
      </div>
      <div class="modal-body">
This project is part of an online audited course: BUILDING DYNAMIC WEBSITES by Harvard University
	  
		  <h4>PROBLEM</h4>
The mission for this project is to implement C$ Finance , a website that allows users to manage portfolios of stocks.<br><br>

The site’s homepage must require user login and also allow to register for an account. It should allow user to get a quote for a stock by providing its symbol. It should allow user to buy and sell shares of a stock. It should allow to check the current value of his or her portfolio.<br><br>

		 


		  <large>TECHNOLOGIES USED</large>
		  <ul>
			  <li>HTML &nsub; CSS</li>
			  <li>php</li>
			  <li>SQL - MySQL (phpMyAdmin)</li>	
			  <li>Javascript</li>
			  <li>Bootstrap</li>
		  </ul>


   
   
   
    <h5>If you would like to know more about the specifications of school project, please click <a href="http://cdn.cs75.net/2012/summer/projects/1/project1.pdf" target="_blank">HERE</a> </h5>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>