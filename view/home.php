<?php
require_once(M."model.php");
require_once(helper);
render('header', array('title' => 'C$75 MarketPlace'));
//$balance=get_user_balance($_SESSION['userid']);//find it a way to pass it from controller (aka write this function i conteroller)
//$balance=get_user_balance($_SESSION['userid']);//find it a way to pass it from controller (aka write this function i conteroller)
?>

<ul>
    <!-- <li> Balance = <?= $balance ?>$</li> -->
	<li><a href="index.php?page=lookup">Get quote for Google</a></li>
	<li><a href="index.php?page=portfolio">View Portfolio</a></li>
	<li><a href="index.php?page=logout">Logout</a></li>
</ul>

<?php
render('footer');
?>
