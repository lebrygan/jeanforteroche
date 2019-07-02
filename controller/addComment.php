<?php
require_once('../model/CommentsManager.php');
require_once('../model/Comment.php');

if(isset($_POST['comment']) && isset($_POST['billet'])){
	$commentManager = new CommentsManager;

	$data['relativeBillet'] = $_POST['billet'];
	$data['comment'] = $_POST['comment'];
	$data['signaled'] = 0;
	$newComment = new Comment($data);

	$commentManager->add($newComment);
}

header('Location: ../index.php');