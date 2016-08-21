<?php


//niclude helpers
require(helper);


if (isset($_SESSION['userid']))
	render('home');
else
	render('login');

?>