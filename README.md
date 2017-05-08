# do-php-library

DigitalOcean API v2 PHP Library is a set of PHP classes designed to interact with the DigitalOcean API v2. The aim of this project is to create a simple library that can be included easily without Composer or any other autoloader.

## Requirements

* PHP 5.3 or higher, with `cURL` enabled


## How to use

Simply include `do-php-library.php` and provide the `DigitalOceanClient` class with your access token.

## Code Example

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

## Endpoint Classes

### AccountClient

* `getUserInformation()`

### ActionsClient

* `getActions()`
* `getActionsById(int $id)`

### BlockStorageClient

* `getVolumes()`
* `createVolume(array $attributes)`
* `getVolumeById(int $id)`
* `getVolumeByName(string $drive_name, string $region)`
* `getSnapshotsByVolumeId(int $id)`
* `createSnapshotByVolumeId(int $id, array $attributes)`
* `deleteVolumeById(int $id)`
* `deleteVolumeByName(string $drive_name, string $region)`

### BlockStorageActionsClient

### CertificatesClient

### DomainsClient

* `getDomains()`
* `createDomain(array $attributes)`
* `getDomain(string $domain_name)`
* `deleteDomain(string $domain_name)`

### DomainRecordsClient

* `getDomainRecords(string $domain_name)`
* `createDomainRecord(string $domain_name, array $attributes)`
* `getDomainRecord(string $domain_name, int $record_id)`
* `updateDomainRecord(string $domain_name, int $record_id, array $attributes)`
* `deleteDomainRecord(string $domain_name, int $record_id)`

### DropletClient

* `createDroplet(array $attributes)`
* `deleteDropletById(int $id)`
* `deleteDropletsByTag(string $tag_name)`
* `getDropletActionsById(int $id)`
* `getDropletBackupsById(int $id)`
* `getDropletById(int $id)`
* `getDropletByTag(string $tag_name)`
* `getDropletKernelsById(int $id)`
* `getDropletNeighbors()`
* `getDropletNeighborsById(int $id)`
* `getDroplets()`
* `getDropletsByTag(string $tag_name)`
* `getDropletSnapshotsById(int $id)`
* `getImages()`

### DropletActionsClient

### ImagesClient

### ImageActionsClient

### LoadBalancersClient

### SnapshotsClient

### SSHKeysClient

* `getKeys()`
* `createKey(array $attributes)`
* `getKeyById(int $key_id)`
* `getKeyByFingerprint(string $key_fingerprint)`
* `updateKeyById(int $key_id, array $attributes)`
* `updateKeyByFingerprint(string $key_fingerprint, array $attributes)`
* `deleteKeyById(int $key_id)` __or__ `destroyKeyById(int $key_id)`
* `deleteKeyByFingerprint(string $key_fingerprint)` __or__ `destroyKeyByFingerprint(string $key_fingerprint)`

### RegionsClient

* `getRegions()`

### SizesClient

* `getSizes()`

### FloatingIpsClient

* `getFloatingIps()`
* `createFloatingIp(array $attributes)`
* `getFloatingIp(string $ip_address)`
* `deleteFloatingIp(string $ip_address)`

### FloatingIpActionsClient

### TagsClient

