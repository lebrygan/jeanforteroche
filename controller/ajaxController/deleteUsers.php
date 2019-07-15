<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/managers/UsersManager.php');

//Delete a user in the database
if(isset($_POST['email'])){
	$usersManager = new UsersManager;
	$usersManager->delete($_POST['email']);
}