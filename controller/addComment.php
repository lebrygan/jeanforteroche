<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/managers/CommentsManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/entitys/Comment.php');

if(isset($_POST['comment']) && isset($_POST['billet'])){
	$commentManager = new CommentsManager;

	$data['relativeBillet'] = $_POST['billet'];
	$data['comment'] = $_POST['comment'];
	$data['signaled'] = 0;
	$newComment = new Comment($data);

	$commentManager->add($newComment);
}

header('Location: ../index.php');