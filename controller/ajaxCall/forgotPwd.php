<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/model/managers/UsersManager.php');

//If the user forgot his password, send an email with a new random password
if(isset($_POST['email'])){
	$usersManager = new UsersManager;
	$usersManager->forgotPwd($_POST['email']);
}