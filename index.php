<?php
session_start();

require('controller/controller.php');

if(isset($_GET['logout'])){
	session_destroy();
	header('Location: index.php'); 
}

if(isset($_GET['user'])){
	if($_GET['user'] == 'destroy'){
		session_destroy();
	} else if($_GET['user'] == 'visitor'){
		$_SESSION['user'] = 'visitor';
	}
	header('Location: index.php');
}

if(isset($_SESSION['user'])){
	if($_SESSION['user'] == 'visitor')
		visitorsView();
}
else{
	require('view/welcomePage.php');
}
