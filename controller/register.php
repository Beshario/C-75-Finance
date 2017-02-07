<?php
/*******************
 * register.php
 *
 * CSCI S-75 2016
 * Project 1
 * Beshari jamal
 *
 * Login controller
 *******************/

require_once(M.'model.php');
require_once(helper);

if (isset($_POST['fname']) &&
	isset($_POST['lname']) &&
   isset($_POST['Email']) &&
   isset($_POST['password']))
{
    //echo 'we got the names';
	$fname = $_POST['fname'];
    $lname = $_POST['lname'];
	$email = $_POST['Email'];
	$password = $_POST['password'];
    //echo 'we got the names'.$fname.$lname.$email.$password;
	$pwdhash = $password; // hash("SHA1", $password); //trying with no hashing first
    $result=register_user($fname, $lname, $email, $pwdhash);
    //echo "<br> passed variable from registerer: "; var_dump($result);
	if ($result)
    {
        $userid = login_user($email, $pwdhash);
        echo '<br>registerred :'.$userid; //show it in temporary 
    }
	if ($userid > 0)
	{
		$_SESSION['userid'] = $userid;
		render('home');
	}
	else
	{
		render('pwdhash',array('Register Error' => $pwdhash));
	}
}
else
{
    echo 'we didnt get the full details';
	render('login');
}
?>
