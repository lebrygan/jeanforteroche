<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/projet4/model/managers/UsersManager.php');

if(isset($_POST['email'])){
	$usersManager = new UsersManager;

	$usersManager->forgotPwd($_POST['email']);
	
}