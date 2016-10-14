<?php

/*******************
 * buy.php
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
   // echo "we are in the buy controller";
    $userid=$_SESSION['userid'];
    $symbol=$_REQUEST['param'];
    $qty=$_POST['qty'];
    $symbol=$_POST['param'];
    $pp=$_POST['pp'];
    //echo "$userid $symbol $qty <br>";
    $result= buy_shares($userid, $symbol, $pp, $qty);
    if($esult)
        print "share bought!!!";
        $_SESSION['wallet']=get_user_balance($userid);
    require ("portfolio.php");
}

else
	render('login');

?>
