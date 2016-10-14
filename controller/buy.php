<?php

/*******************
 * register.php
 *
 * CSCI S-75 2016
 * Project 1
 * Beshari jamal
 *
 * Buy controller
 *******************/
require_once(M.'model.php');
require_once(helper);

if (isset($_SESSION['userid']) &&
	isset($_REQUEST['param']) &&
   isset($_POST['qty']) &&
   isset($_POST['pp'])){
    $userid=$_SESSION['userid'];
    $symbol=$_REQUEST['param'];
    $qty=$_POST['qty'];
    $symbol=$_POST['pp'];
    result= buy_shares($userid, $symbol, $pp, $qty, &$error);

}

else
	render('login');

?>


?>