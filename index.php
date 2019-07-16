<?php
// Router
session_start();

try{
	$content = '';
	require('controller/controller.php');

	//if the client clicks on the main title, he is loged out 
	if(isset($_GET['logout'])){
		session_destroy();
		header('Location: /'); 
	}

	//Create session variable, then erase the url
	if(isset($_GET['user'])){
		if($_GET['user'] == 'destroy'){
			session_destroy();
		} else if($_GET['user'] == 'visitor'){
			$_SESSION['user'] = 'visitor';
		} else if($_GET['user'] == 'author'){
			$_SESSION['user'] = 'author';
		}
		header('Location: /');
	}

	//Router choice depend only on the session variables
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
	ob_clean();
	$script = '';
	$content = '<p class="p-2 m-0 text-center bg-white">'.$e->getMessage().'</p>';
	require('view/template.php');
}