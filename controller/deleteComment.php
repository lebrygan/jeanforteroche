<?php
require_once('../model/CommentsManager.php');

if(isset($_POST['comment'])){
	$commentManager = new CommentsManager;
	$commentManager->delete((int) $_POST['comment']);
}