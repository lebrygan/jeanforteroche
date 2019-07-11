<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/model/managers/UsersManager.php');

if(isset($_POST['email']) && isset($_POST['pwd'])){
	$usersManager = new UsersManager;

	if($usersManager->getPassword($_POST['email']) != null)
		$usersManager->changePwd($_POST['email'],$_POST['pwd']);
	else
		$usersManager->addUsers($_POST['email'],$_POST['pwd']);
	
}