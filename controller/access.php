<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/model/managers/UsersManager.php');

//Check password with the database
if(isset($_POST['email']) and isset($_POST['password'])){
	$usersManager = new UsersManager;
	$password = $usersManager->getPassword($_POST['email']);

	if(password_verify($_POST['password'], $password['password']) && $_POST['password'] != ''){
		$_SESSION['isConnected'] = 'connected';
	}
	header('Location: ../');
}else{
	throw new InvalidArgumentException("L'email ou le mot de passe n'ont pas été spécifiés.");
}