# PHP HE Tools

This is a collection of tools to interact with Hive Engine sidechain (from HIVE Blockchain).

This project has been mainlyinspired by [PHP-HIVE-Tools](https://github.com/dragosroua/php-hive-tools) made by [Dragos Roua](https://github.com/dragosroua).

Very early stage project. Use it at your own risk.

## Features

* cURL layer
* Debug mode to show request and result

## Installation

Just use Composer : `composer require fkosmala/php-he-tools`

## How to use it ?

```php
// Declare this lib
use FKosmala\PHPHeTools\HeApi as HeApi;

//Create configuration array
$heConfig = [
	"debug" => false,
	"heNode" => "api2.hive-engine.com/rpc/contracts"
];

// Create it
$heApi = new HeApi($heConfig);

//Use it
$meh = $heApi->getHeTokensFromAccount("YOUR_HIVE_ACCOUNT");
```

----

## To Do :

* Create functions to retrieve all HiveEngine data
* List them
* Write documentation
