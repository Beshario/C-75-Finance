<?php
require_once('../includes/helper.php');
render('header', array('title' => 'C$75 Finance'));
?>



<div style="max-width:1200px; align-content:center">
  <div class="row">
    <div class="col-xs-12 col-sm-offset-6 col-sm-6 col-md-5 col-md-offset-7 col-lg-4 col-lg-offset-8">
      <form action="register" method="get" action="index.php?page=register"> //onsubmit...
        <div class="form-group">
          
          <label>First Name</label>
          <input type="text" class="form-control" name="fname" placeholder="Enter First Name">
          
          <label >Last Name</label>
          <input type="text" class="form-control" name="lname" aria-describedby="emailHelp" placeholder="Enter Last Name">
          
          <label> Email Address</label>
          <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
          
          <label> Password</label>
          <input type="password" class="form-control" name="password" aria-describedby="emailHelp" placeholder="Password">
          <br>
            <button type="submit" class="btn btn-primary" value="Submit">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?/**
<form method="POST" action="login" onsubmit="return validateForm();">
    E-mail address: <input type="text" name="email" /><br />
    Password: <input type="password" name="password" /><br />
	<input type="submit" value="Login" />
</form>

<script type='text/javascript'>
// <! [CDATA[

function validateForm()
{
	isValid = true;
	
	// check if the email address was entered (min=6: x@x.to)
	emailField = $("input[name=email]");
	if (emailField.val().length < 6)
		isValid = false;
		
	return isValid;
}

// set the focus to the email field (located by id attribute)
$("input[name=email]").focus();

// ]] >
</script>

<?php **/

render('footer');
?>
