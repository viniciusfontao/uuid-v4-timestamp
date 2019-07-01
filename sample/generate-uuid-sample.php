<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Uuid\Uuid;

$uuid = new Uuid();
$uuid4 = $uuid->uuid4();
print_r($uuid4);
