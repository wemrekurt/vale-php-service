<?php

require __DIR__ . '/header.php';

echo json_encode($ig->location->getFeed($_GET['id'], \InstagramAPI\Signatures::generateUUID()));
