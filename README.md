# digitalocean-php-library

**DigitalOcean PHP Library** is a set of PHP classes designed to interact with the DigitalOcean API v2. The aim of this project is to create a simple library that can be included easily without an autoloader like Composer.

## Requirements

* PHP 5.3+ with `cURL` enabled


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

* `attachVolumeById(int $volume_id, array $attributes)`
* `attachVolumeByName(array $attributes)`
* `deleteVolumeById(int $volume_id, array $attributes)`
* `deleteVolumeByName(array $attributes)`
* `resizeVolume(int $volume_id, array $attributes)`
* `getVolumeActions(int $volume_id)`
* `getVolumeAction(int $volume_id, int $action_id)`

### CertificatesClient

* `createCertificate(array $attributes)`
* `getCertificate(int $certificate_id)`
* `getCertificates()`
* `deleteCertificate(int $certificate_id)`

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

* `function enableBackups(int $droplet_id, array $attributes)`
* `function disableBackups(int $droplet_id, array $attributes)`
* `function reboot(int $droplet_id, array $attributes)`
* `function powerCycle(int $droplet_id, array $attributes)`
* `function shutdown(int $droplet_id, array $attributes)`
* `function powerOff(int $droplet_id, array $attributes)`
* `function powerOn(int $droplet_id, array $attributes)`
* `function restore(int $droplet_id, array $attributes)`
* `function resetPassword(int $droplet_id, array $attributes)`
* `function resize(int $droplet_id, array $attributes)`
* `function rebuild(int $droplet_id, array $attributes)`
* `function rename(int $droplet_id, array $attributes)`
* `function changeKernel(int $droplet_id, array $attributes)`
* `function enableIPv6(int $droplet_id, array $attributes)`
* `function enablePrivateNetworking(int $droplet_id, array $attributes)`
* `function createSnapshot(int $droplet_id, array $attributes)`
* ~~`function doActionByTag($tag_name, $attributes)`~~
* `function getAction(int $droplet_id, int $action_id)`

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

* `assignFloatingIp(string $ip_address, int $droplet_id)`
* `unassignFloatingIp(string $ip_address)`
* `getActions(string $ip_address)`
* `getActionById(string $ip_address, int $action_id)`

### TagsClient

* `createTag($string tag_name)`
* `getTag(string $tag_name)`
* `getTags()`
* `tagResource(string $tag_name, int $resource_id, string $resource_type)`
* `untagResource(string $tag_name, int $resource_id, string $resource_type)`
* `deleteTag(string $tag_name)`
