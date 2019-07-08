<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/projet4/model/managers/BilletsManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/projet4/model/managers/CommentsManager.php');

function visitorsView(){
	$billetsManager = new BilletsManager;
	$billets = $billetsManager->getList(true);

	$commentsManager = new CommentsManager;


	$comments = [];

	$content = '';

	foreach ($billets as $billet) {
		$comments = $commentsManager->getList($billet->id());
		include('view/visitorsView.php');

	}
	require('view/template.php');
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

function authorConnect(){
	$content = '';
	require('view/authorView/access.php');
	require('view/template.php');
}