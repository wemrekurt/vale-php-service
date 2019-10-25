<?php

require __DIR__ . '/header.php';

$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);

try {
	$ig->login($credentials->username, $credentials->password);
} catch (\Exception $e) {
	die('Bir hata oluştu: ' . $e->getMessage());
}

echo json_encode($ig->hashtag->getFeed($_GET['tag'], \InstagramAPI\Signatures::generateUUID()));
