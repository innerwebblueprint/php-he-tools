<?php

// Load composer dependancies
require __DIR__ . '/vendor/autoload.php';
use FKosmala\PHPHeTools\HeApi as HeApi;

// Create config array with settings
$config = [
	"debug" => false,
	'throw_exception' => false,
	"heNode" => "api2.hive-engine.com/rpc"
];

// Init HiveEngine API with config array
$api = new HeApi($config);

// Select an account
$account = "bambukah";

// try the method
$result = $api->getAccountTokens($account);

// Display the result
print_r($result);
?>
