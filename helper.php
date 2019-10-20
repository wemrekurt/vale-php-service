<?php

function save_cache($account, $cache_file){
  $item = response_object($account);

  $file = fopen($cache_file, 'w');
  fwrite($file, json_encode($item, JSON_UNESCAPED_UNICODE));
  fclose($file);
}

function response_object($account) {
  return [
    "id" => $account->getId(),
    "username" => $account->getUsername(),
    "name" => $account->getFullName(),
    "image" => $account->getProfilePicUrl()
  ];
} 

?>
