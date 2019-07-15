<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/managers/CommentsManager.php');

//Remove the signal from a comment
//The comment may be seen again in the client view
if(isset($_POST['comment'])){
	$commentManager = new CommentsManager;
	$commentManager->unSignal((int) $_POST['comment']);
}