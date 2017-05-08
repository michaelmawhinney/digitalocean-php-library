<?php

require( __DIR__ . DIRECTORY_SEPARATOR . "do-php-library.php");

if (!class_exists('\PHPUnit_Framework_TestCase') && class_exists('\PHPUnit\Framework\TestCase')) {
    class_alias('\PHPUnit\Framework\TestCase', '\PHPUnit_Framework_TestCase');
}

class Test extends PHPUnit_Framework_TestCase
{
    public function testDigitalOceanClient()
    {
        $config = array( "access_token" => "testing" );
        $instance = new DigitalOceanClient($config);
        $this->assertInstanceOf('DigitalOceanClient', $instance);
    }
}

?>
