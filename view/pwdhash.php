<?php
require_once('../includes/helper.php');
render('header', array('title' => 'Password Hash Helper :)'));
?>


<div class="panel panel-danger">
  <div class="panel-heading">Something Went Wrong</div>
  <div class="panel-body">
    Password hash: <?=htmlspecialchars($pwdhash) ?>
  </div>
</div>


<?php
render('footer');
?>
