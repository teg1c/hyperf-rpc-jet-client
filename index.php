<?php
require_once './vendor/autoload.php';
require_once './OrderService.php';
$client = new OrderService();
$result = $client->add(2, 2);
var_dump($result);