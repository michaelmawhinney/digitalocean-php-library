<?php

require( __DIR__ . DIRECTORY_SEPARATOR . "do-php-library.php");

class Test extends PHPUnit_Framework_TestCase
{
    public function testAccountClientGetUserInformation()
    {
        $client = new AccountClient(['access_token'=>'testing']);
        $result = $client->getUserInformation();
        $this->expectExceptionMessage("API Error: Unable to authenticate you.");
    }
}

?>
