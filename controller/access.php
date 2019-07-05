<?php
session_start();
require_once('../model/users.php');

if(isset($_POST['email']) and isset($_POST['password'])){
	$password = getPassword($_POST['email']);
	$test = 'echec';
	if(password_verify($_POST['password'], $password['password'])){
		$_SESSION['isConnected'] = 'connected';
		$test = 'reussi';
	}
	header('Location: ../index.php?'.$test);
}