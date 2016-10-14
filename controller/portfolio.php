<?php
/*********************
 * portfolio.php
 *
 * CSCI S-75
 * Project 1
 * Chris Gerber
 *
 * Portfolio controller
 *********************/

require_once(M.'model.php');
require_once(helper);

if (isset($_SESSION['userid']))
{
	// get the list of holdings for user
	$userid = (int)$_SESSION['userid'];
	$holdings = get_user_shares($userid);
    $holding_len=count($holdings);
	for ($x=0; $x<$holding_len; $x++)
    {
        $share=get_quote_data($holdings[$x]["SYMBOL"]);
        $price=array('PRICE'=> $share["last_trade"]);
        $holdings[$x]= $holdings[$x]+$price;
    }
    //print_r($holdings);
	render('portfolio', array('holdings' => $holdings));
}
else
{
	render('login');
}
?>
