<?php 

session_start();
/*********************
 * index.php
 *
 * CSCI S-75
 * Project 1
 * Beshari Jamal
 *
 * Dispatcher for MVC
 *********************/
error_reporting(E_ERROR | E_WARNING | E_PARSE);

define('APP_FOLDER','');
define('M', '../model/');
define('V', '../view/');
define('C', '../controller/');
define('html', '../html');
define('helper', '../includes/helper.php');

if (isset($_GET["page"]))
{$page = $_GET["page"];
//echo 'hi we got the page and its: '.$page.'<br>';
}
else
	$page = "home";

$path = __DIR__ . '/../controller/' . $page . '.php';
if (file_exists($path))
	require($path);

 


//require(C . "controller.php");
//require_once('../includes/helper.php');

//render('header', array('title' => 'C$75 Finance'));
?>

