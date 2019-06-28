<?php
	session_start();
	require('controlleur.php');

	if(isset($_GET['logout'])){
		session_destroy();
		header('Location: index.php'); 
	}

	if(isset($_GET['user'])){
		if($_GET['user'] == 'visitor'){
			$_SESSION['user'] = 'visitor';
		}
	}

	if(isset($_SESSION['user'])){
		if($_SESSION['user'] == 'visitor')
			require('view/visitorsView.php');
	}
	else{
		require('view/welcomePage.php');
	}

 ?>