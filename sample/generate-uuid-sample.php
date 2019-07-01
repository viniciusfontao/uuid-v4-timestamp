<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Uuid\Uuid;

$uuidHelper = new Uuid();
$uuid = $uuidHelper->uuid4();
$uuidHelper->newUuidFactory();
print_r($uuid);
