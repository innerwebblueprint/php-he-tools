# PHP HiveEngine Tools
This library is a collection of PHP methods to interact with Hiveengine sidechain. PHP HE Tools is still in development. 

This library was mainly inspired by Dragos Roua [PHP Hive Tools](https://github.com/dragosroua/php-hive-tools) which made the same, but for [HIVE](https://hive.io) blockchain.

## Features
- Use cURL transport layer
- Debug mode for display request and result
- Just cURL and `php-curl` dependency

## Installation & usage
Use Composer to install this lib :
``composer require fkosmala/php-he-tools`

Init Composer into your PHP file and load the API :
```php
require __DIR__ . '/vendor/autoload.php';
use FKosmala\PHPHeTools\HeApi as HeApi;
```

Don't forget to create the configuration array (needed for queries) :
```php
$config = [
	"debug" => false,
	'throw_exception' => false,
	"heNode" => "api2.hive-engine.com/rpc"
];
```
Init the API
```php
$api = new HeApi($config);
```
You can now use every methods of PHP-HE-Tools !

## Example
There is a small example page into the `example` folder.

## Contribute
If you found a bug, please use Issues page.
If you want to add amethod / function or feature, just fork this repo, modify the code, test it and made a pull request.

## Showcase
List of projects using this library :

- [SuperHive](https://superhive.me/), the Web3 blog engine

If you want to add you project into this list, please contact me : `contact |AT] florent-kosmala.fr`
