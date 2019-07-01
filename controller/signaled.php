<?php
require_once('../model/CommentsManager.php');

if(isset($_POST['comment'])){
	$commentManager = new CommentsManager;
	$commentManager->signal($_POST['comment']);
}