<?php

header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/helper.php';

$id = 4448572312;
$cache_file = __DIR__.'/cache/users/'.$id.'.json';
$ignore_cache = false;

if(file_exists($cache_file) && !$ignore_cache){
  $response = json_decode(file_get_contents($cache_file)); 
}else {
  $credentials = json_decode(file_get_contents(__DIR__.'/credentials.json'));
  $instagram = \InstagramScraper\Instagram::withCredentials($credentials->username, $credentials->password, __DIR__ .'/cache');
  $instagram->login();
  
  $account = $instagram->getAccountById($id);
  save_cache($account, $cache_file);

  $response = response_object($account);
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
