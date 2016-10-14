<?php
/*******************
 * login.php
 *
 * CSCI S-75 2016
 * Project 1
 * Beshari Jamal
 *
 * Login controller
 *******************/

require_once(M.'model.php');
require_once(helper);

if (isset($_SESSION['userid'])){
    $userid=$_SESSION['userid'];
    $balance=get_user_balance($userid);
    render('home');
}
elseif (isset($_POST['email']) &&
	isset($_POST['password'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$pwdhash = $password;// hash("SHA1", $password);
	
	$userid = login_user($email, $password);
	if ($userid > 0)
	{
		$_SESSION['userid'] = $userid;
        $balance=get_user_balance($userid);
        //echo 'loggedin';
		render('home');
	}
	else
	{
		render('pwdhash',array('pwdhash' => $pwdhash));
	}
}
else
{
	render('login');
}
?>
