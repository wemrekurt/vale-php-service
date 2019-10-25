<?php

require __DIR__ . '/header.php';

$id = intval($_GET['user_id']);
$cache_file = __DIR__.'/cache/users/'.$id.'.json';
$ignore_cache = isset($_GET['skip_cache']);

if(file_exists($cache_file) && !$ignore_cache){
  $response = json_decode(file_get_contents($cache_file)); 
}else {
  $instagram = \InstagramScraper\Instagram::withCredentials($credentials->username, $credentials->password, __DIR__ .'/cache');
  $instagram->login();
  
  $account = $instagram->getAccountById($id);
  save_cache($account, $cache_file);

  $response = response_object($account);
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
