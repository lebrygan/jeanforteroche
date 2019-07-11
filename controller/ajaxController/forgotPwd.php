<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/model/managers/UsersManager.php');

if(isset($_POST['email'])){
	$usersManager = new UsersManager;

	$usersManager->forgotPwd($_POST['email']);
	
}