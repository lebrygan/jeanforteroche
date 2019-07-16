<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/managers/BilletsManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/managers/CommentsManager.php');

//Delete a billet in the database
if(isset($_POST['billet'])){
	$billetsManager = new BilletsManager;
	$commentManager = new CommentsManager;

	$billetsManager->delete($_POST['billet']);
	$commentManager->delete($_POST['billet'],true);
}