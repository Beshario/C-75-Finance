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
   isset($_POST['email']) &&
   isset($_POST['password']))
{
	$fname = $_POST['fname'];
    $lname = $_POST['lname'];
	$email = $_POST['Email'];
	$password = $_POST['password'];
	$pwdhash = $password; // hash("SHA1", $password); //trying with no hashing first
    $result=register_user($fnmae, $lname, $email, $pwdhash);
    //echo "<br> passed variable from register: "; var_dump($result);
	if ($result)
    {
        $userid = login_user($email, $pwdhash);
        echo 'registerred'; //show it in temporary 
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
	render('login');
}
?>
