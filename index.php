<?php
session_start();

require('controller/controller.php');

try{
	if(isset($_GET['logout'])){
		session_destroy();
		header('Location: index.php'); 
	}

	if(isset($_GET['user'])){
		if($_GET['user'] == 'destroy'){
			session_destroy();
		} else if($_GET['user'] == 'visitor'){
			$_SESSION['user'] = 'visitor';
		} else if($_GET['user'] == 'author'){
			$_SESSION['user'] = 'author';
		}
		header('Location: /index.html');
	}
	if(isset($_SESSION['user'])){
		if($_SESSION['user'] == 'visitor')
			visitorsView();
		else if($_SESSION['user'] == 'author'){
			if(isset($_SESSION['isConnected'])){
				if($_SESSION['isConnected'] == 'connected')
					authorView();
				else{
					authorConnect();
				}
			}else{
				authorConnect();
			}
		}else{
			require('view/welcomePage.php');
		}
	}
	else{
		require('view/welcomePage.php');
	}
}
catch(Exception $e){
	$content = '<p>'.$e->getMessage().'</p>';
	require('view/error.php');
	require('view/template.php');
}