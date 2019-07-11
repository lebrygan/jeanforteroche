<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/projet4/model/managers/UsersManager.php');

if(isset($_POST['email']) and isset($_POST['password'])){
	$usersManager = new UsersManager;
	$password = $usersManager->getPassword($_POST['email']);

	if(password_verify($_POST['password'], $password['password'])){
		$_SESSION['isConnected'] = 'connected';
	}
	header('Location: ../index.php');
}