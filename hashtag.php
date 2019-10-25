<?php

require __DIR__ . '/header.php';

echo json_encode($ig->hashtag->getFeed($_GET['tag'], \InstagramAPI\Signatures::generateUUID()));
