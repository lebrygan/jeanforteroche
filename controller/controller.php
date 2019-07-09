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
		$comments = $commentsManager->getList($billet->id(),false);
		require('view/visitorsView.php');

	}
	require('view/footer.php');
	require('view/template.php');
}

function authorView(){
	$billetsManager = new BilletsManager;
	$billets = $billetsManager->getList();

	$commentsManager = new CommentsManager;
	$comments = $commentsManager->getSignaled();

	$content = '';
	if(count($comments) > 0)
		require('view/authorView/signaledComment.php');
	else
		require('view/authorView/noSignaledComment.php');
	require('view/authorView/addBillet.php');
	foreach ($billets as $i => $billet){
		$comments = $commentsManager->getList($billet->id(),false);
		require('view/authorView/oldBillets.php');
	}

	require('view/authorView/footer.php');
	require('view/template.php');
}

function authorConnect(){
	$content = '';
	require('view/authorView/access.php');
	require('view/template.php');
}