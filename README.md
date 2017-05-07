# do-php-library

DigitalOcean API v2 PHP Library is a set of PHP classes designed to interact with the DigitalOcean API v2. The aim of this project is to create a simple library that can be included with a single statement, without the need for Composer or any other autoloader.

## How to use

You simply need to include or require the do-php-library.php file in your code and instantiate the DigitalOcean classes with your access token.

## Code Example

*You will need to replace the dummy token below with your actual DigitalOcean API access token.*

```
<?php

require( __DIR__ . DIRECTORY_SEPARATOR . "do-php-library.php");

$client = new DropletClient([
    'access_token' => '783a8a829cafa40f75f4f71bf2a961dcdb2d63448317c512fb4d07f2dd8d1bd0' // REQUIRED
]);

try {
    $result = $client->getDroplets();
} catch(Exception $e) {
    die( 'Caught exception: ' . $e->getMessage() );
}

var_dump( $result );

?>
```
