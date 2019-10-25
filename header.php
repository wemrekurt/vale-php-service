<?php

set_time_limit(0);
date_default_timezone_set('UTC');

header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/helper.php';

\InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;

$credentials = json_decode(file_get_contents(__DIR__.'/credentials.json'));
$debug = false;
$truncatedDebug = false;

$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);

try {
	$ig->login($credentials->username, $credentials->password);
} catch (\Exception $e) {
	die('Bir hata oluştu: ' . $e->getMessage());
}
