<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/projet4/model/managers/CommentsManager.php');

if(isset($_POST['comment'])){
	$commentManager = new CommentsManager;
	$commentManager->unSignal((int) $_POST['comment']);
}