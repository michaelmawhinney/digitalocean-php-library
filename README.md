**DigitalOcean PHP Library** is a set of PHP classes designed to interact with the [DigitalOcean API v2](https://developers.digitalocean.com/documentation/v2/). The aim of this project is to create a simple library that can be included easily without an autoloader like Composer.

# Requirements

* PHP 5.3+ with `cURL` enabled


# How to use

* Include `do-php-library.php` and provide the `DigitalOceanClient` class with your access token.
* Refer to the [Documentation](https://michaelmawhinney.github.io/digitalocean-php-library/) for code examples of each function.


# Basic Example

*You will need to replace the dummy token below with your  DigitalOcean API access token.*

```
<?php

require "do-php-library.php";

$config["access_token"] = "783a8a829cafa40f75f4f71bf2a961dcdb2d63448317c512fb4d07f2dd8d1bd0";
$client = new DigitalOceanClient($config);

try {
    $result = $client->Droplets->getDroplets();
} catch(Exception $e) {
    die( 'Caught exception: ' . $e->getMessage() );
}

var_dump( $result );

?>
```
