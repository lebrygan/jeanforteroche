<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/projet4/model/managers/CommentsManager.php');

if(isset($_POST['comment'])){
	$commentManager = new CommentsManager;
	$commentManager->signal($_POST['comment']);
}