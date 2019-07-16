<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/managers/CommentsManager.php');

//Delete a comment in the database
if(isset($_POST['comment'])){
	$commentManager = new CommentsManager;
	$commentManager->delete((int) $_POST['comment']);
}