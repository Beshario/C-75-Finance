<?php
require_once(helper);
render('header', array('title' => 'C$75 MarketPlace'));
?>

<ul>
	<li><a href="index.php?page=lookup">Get quote for Google</a></li>
	<li><a href="portfolio">View Portfolio</a></li>
	<li><a href="index.php?page=logout">Logout</a></li>
</ul>

<?php
render('footer');
?>
