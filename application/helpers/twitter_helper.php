<?php

function sendTweet($message) {
	require_once("Twitter/Twitter.php");

	$consumerKey = "ffu3EqXE1jC1qou1RgwhdLOYA";
    $consumerSecret = "3P6DqbbgfhVVer1KB8CMRaAx7J7xSiQPS1t89tA3mSnxiCHqJW";
    $accessToken = "1083226726665089024-C9wdDONRVU1YkUcmfeCx6INUB8ckPO";
    $accessTokenSecret = "bQAxGS2GciK5Yh6nCMBmqN24JGTBIYv6LFUc2yxzMOvLA";

    $twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

    $twitter->send($message);
}