<?php

/*******************
 * sell.php
 *
 * CSCI S-75 2016
 * Project 1
 * Beshari jamal
 *
 * sell controller
 *******************/

require_once(M.'model.php');
require_once(helper);

if (isset($_SESSION['userid']) &&
	isset($_POST['transaction']))
{
    $userid=(int)$_SESSION['userid'];
    $id=(int)$_POST['transaction'];
    
    $result=sell_shares($userid, $id);
    $_SESSION['wallet']=get_user_balance($userid);
    //echo $id;
    
    require ("portfolio.php");
    
}