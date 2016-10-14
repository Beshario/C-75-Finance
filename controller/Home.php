<?php


//niclude helpers
require(helper);
require_once(M.'model.php');

if (isset($_SESSION['userid']))
   { $userid=$_SESSION['userid'];
    $_SESSION['wallet']=get_user_balance($userid);
	render('home');}
else
	render('login');

?>