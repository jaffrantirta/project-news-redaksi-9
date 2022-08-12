<?php

function sendFacebook($message) {
	require_once("Facebook/autoload.php");

	$fb = new \Facebook\Facebook([
	  'app_id' => '376972016201913',
	  'app_secret' => 'bf71b07155b1a0ae4ffec0acc8d5b4f9',
	  'default_graph_version' => 'v2.10',
	  //'default_access_token' => '{access-token}', // optional
	]);

	$arr = $message;
	// $user = $fb->getUser();

	$res = $fb->post('me/feed/', $arr,	'EAAFW2qMdsLkBAAmmZB2ZBimK1zWuTedkptHa4RQsPEeUgz1aVBrbEMdfP9uqUouvUKyTMhpDqDiucYZBheP2zrePJ7z2aKo8Qjea6SvZAtgHx7OK4mlXD3oZC3ig5hTOp74wx2OTOI5mCn1gOSDUfVGo4nJpoZAt3PsVgcec4j2DIlm2ZBT3XMb');
}