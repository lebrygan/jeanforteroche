<?php
session_start();
require_once('../model/UsersManager.php');

if(isset($_POST['email']) and isset($_POST['password'])){
	$usersManager = new UsersManager;
	$password = $usersManager->getPassword($_POST['email']);
	$test = 'echec';
	if(password_verify($_POST['password'], $password['password'])){
		$_SESSION['isConnected'] = 'connected';
	}
	header('Location: ../index.php');
}