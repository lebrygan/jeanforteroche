<?php
require_once('model/BilletsManager.php');
require_once('model/CommentsManager.php');

function visitorsView(){
	$billetsManager = new BilletsManager;
	$billets = $billetsManager->getList();

	$commentsManager = new CommentsManager;
	$comments = $commentsManager->getList();

	require('view/visitorsView.php');
}

function authorView(){
	$billetsManager = new BilletsManager;
	$billets = $billetsManager->getList();

	$commentsManager = new CommentsManager;
	$comments = $commentsManager->getList();

	$isSignaled=false;
	foreach ($comments as $comment) {
		if($comment->signaled() == true){
			$isSignaled=true;
			break;
		}
	}
	$content = '';
	if($isSignaled)
		require('view/authorView/signaledComment.php');
	else
		require('view/authorView/noSignaledComment.php');

	require('view/authorView/billets.php');
	require('view/authorView/footer.php');
	require('view/template.php');
}