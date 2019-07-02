<?php
require_once('../model/CommentsManager.php');

if(isset($_POST['comment'])){
	$commentManager = new CommentsManager;
	$commentManager->unSignal((int) $_POST['comment']);
}