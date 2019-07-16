<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/managers/CommentsManager.php');

//Signal a comment in the database
//Signaled comment are not shown in the client view
if(isset($_POST['comment'])){
	$commentManager = new CommentsManager;
	$commentManager->signal($_POST['comment']);
}