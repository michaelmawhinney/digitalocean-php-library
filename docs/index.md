**DigitalOcean PHP Library** is a set of PHP classes designed to interact with the DigitalOcean API v2. The aim of this project is to create a simple library that can be included easily without an autoloader like Composer.

# class DigitalOceanClient

*This main class can be used to load all the endpoint classes.*

```
$client = new DigitalOceanClient([
    'access_token' => '<string>' // REQUIRED
]);
```

## class AccountClient

*This class interacts with the `/v2/account/` endpoint.*

### method getUserInformation

<https://developers.digitalocean.com/documentation/v2/#get-user-information>

```
$result = $client->Account->getUserInformation();
```

## class ActionsClient

### method getActions

<https://developers.digitalocean.com/documentation/v2/#list-all-actions>

```
$result = $client->Actions->getActions();
```

### method getActionsById

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-action>

```
$result = $client->Actions->getActionsById([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Actions->getActionById([
    'id' => '<string>' // REQUIRED
]);
```

## class BlockStorageClient

### method getVolumes

<https://developers.digitalocean.com/documentation/v2/#list-all-block-storage-volumes>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method createVolume

<https://developers.digitalocean.com/documentation/v2/#create-a-new-block-storage-volume>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getVolumeById

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-block-storage-volume>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getVolumeByName

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-block-storage-volume-by-name>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getSnapshotsByVolumeId

<https://developers.digitalocean.com/documentation/v2/#list-snapshots-for-a-volume>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method createSnapshotByVolumeId

<https://developers.digitalocean.com/documentation/v2/#create-snapshot-from-a-volume>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method deleteVolumeById

<https://developers.digitalocean.com/documentation/v2/#delete-a-block-storage-volume>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method deleteVolumeByName

<https://developers.digitalocean.com/documentation/v2/#delete-a-block-storage-volume-by-name>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```


## class BlockStorageActionsClient

### method attachVolumeById

<https://developers.digitalocean.com/documentation/v2/#attach-a-block-storage-volume-to-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method attachVolumeByName

<https://developers.digitalocean.com/documentation/v2/#attach-a-block-storage-volume-to-a-droplet-by-name>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method deleteVolumeById

<https://developers.digitalocean.com/documentation/v2/#remove-a-block-storage-volume-from-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method deleteVolumeByName

<https://developers.digitalocean.com/documentation/v2/#remove-a-block-storage-volume-from-a-droplet-by-name>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method resizeVolume

<https://developers.digitalocean.com/documentation/v2/#resize-a-volume>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getVolumeActions

https://developers.digitalocean.com/documentation/v2/#list-all-actions-for-a-volume<>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getVolumeAction

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-volume-action>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

## class CertificatesClient

### method createCertificate

<https://developers.digitalocean.com/documentation/v2/#create-a-new-certificate>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getCertificate

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-certificate>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getCertificates

<https://developers.digitalocean.com/documentation/v2/#list-all-certificates>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method deleteCertificate

<https://developers.digitalocean.com/documentation/v2/#delete-a-certificate>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```


## class DomainsClient

### method getDomains

<https://developers.digitalocean.com/documentation/v2/#list-all-domains>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method createDomain

<https://developers.digitalocean.com/documentation/v2/#create-a-new-domain>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getDomain

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-domain>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method deleteDomain

<https://developers.digitalocean.com/documentation/v2/#delete-a-domain>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```


## class DomainRecordsClient

### method getDomainRecords

<https://developers.digitalocean.com/documentation/v2/#list-all-domain-records>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method createDomainRecord

<https://developers.digitalocean.com/documentation/v2/#create-a-new-domain-record>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getDomainRecord

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-domain-record>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method updateDomainRecord

<https://developers.digitalocean.com/documentation/v2/#update-a-domain-record>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method deleteDomainRecord

<https://developers.digitalocean.com/documentation/v2/#delete-a-domain-record>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

## class DropletClient

### method createDroplet

<https://developers.digitalocean.com/documentation/v2/#create-a-new-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getDropletById

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-droplet-by-id>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getDroplets

<https://developers.digitalocean.com/documentation/v2/#list-all-droplets>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getDropletsByTag

<https://developers.digitalocean.com/documentation/v2/#listing-droplets-by-tag>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getKernelsByDropletId

<https://developers.digitalocean.com/documentation/v2/#list-all-available-kernels-for-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getSnapshotsByDropletId

<https://developers.digitalocean.com/documentation/v2/#list-snapshots-for-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getBackupsByDropletId

<https://developers.digitalocean.com/documentation/v2/#list-backups-for-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getActionsByDropletId

<https://developers.digitalocean.com/documentation/v2/#list-actions-for-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method deleteDropletById

<https://developers.digitalocean.com/documentation/v2/#delete-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method deleteDropletsByTag

<https://developers.digitalocean.com/documentation/v2/#deleting-droplets-by-tag>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getNeighborsByDropletId

<https://developers.digitalocean.com/documentation/v2/#list-neighbors-for-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getNeighbors

<https://developers.digitalocean.com/documentation/v2/#list-all-droplet-neighbors>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

## class DropletActionsClient

### method enableBackups

<https://developers.digitalocean.com/documentation/v2/#enable-backups>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method disableBackups

<https://developers.digitalocean.com/documentation/v2/#disable-backups>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method reboot

<https://developers.digitalocean.com/documentation/v2/#reboot-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method powerCycle

<https://developers.digitalocean.com/documentation/v2/#power-cycle-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method shutdown

<https://developers.digitalocean.com/documentation/v2/#shutdown-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method powerOff

<https://developers.digitalocean.com/documentation/v2/#power-off-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method powerOn

<https://developers.digitalocean.com/documentation/v2/#power-on-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method restore

<https://developers.digitalocean.com/documentation/v2/#restore-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method resetPassword

<https://developers.digitalocean.com/documentation/v2/#password-reset-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method resize

<https://developers.digitalocean.com/documentation/v2/#resize-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method rebuild

<https://developers.digitalocean.com/documentation/v2/#rebuild-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method rename

<https://developers.digitalocean.com/documentation/v2/#rename-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method changeKernel

<https://developers.digitalocean.com/documentation/v2/#change-the-kernel>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method enableIPv6

<https://developers.digitalocean.com/documentation/v2/#enable-ipv6>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method enablePrivateNetworking

<https://developers.digitalocean.com/documentation/v2/#enable-private-networking>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method createSnapshot

<https://developers.digitalocean.com/documentation/v2/#snapshot-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### ~~method doActionByTag~~

<https://developers.digitalocean.com/documentation/v2/#acting-on-tagged-droplets>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getAction

<https://developers.digitalocean.com/documentation/v2/#retrieve-a-droplet-action>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```


## class ImagesClient

### method getImages

<https://developers.digitalocean.com/documentation/v2/#list-all-images>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getDistributionImages

<https://developers.digitalocean.com/documentation/v2/#list-all-distribution-images>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getApplicationImages

<https://developers.digitalocean.com/documentation/v2/#list-all-application-images>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getUserImages

<https://developers.digitalocean.com/documentation/v2/#list-a-user-s-images>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getActions

<https://developers.digitalocean.com/documentation/v2/#list-all-actions-for-an-image>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getImageById

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-image-by-id>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getImageBySlug

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-image-by-slug>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method updateImage

<https://developers.digitalocean.com/documentation/v2/#update-an-image>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method deleteImage

<https://developers.digitalocean.com/documentation/v2/#delete-an-image>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```


## class ImageActionsClient

### method transferImage

<https://developers.digitalocean.com/documentation/v2/#transfer-an-image>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method convertImageToSnapshot

<https://developers.digitalocean.com/documentation/v2/#convert-an-image-to-a-snapshot>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getAction

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-image-action>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```


## class LoadBalancersClient

### method createLoadBalancer

<https://developers.digitalocean.com/documentation/v2/#create-a-new-load-balancer>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getLoadBalancer

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-load-balancer>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getLoadBalancers

<https://developers.digitalocean.com/documentation/v2/#list-all-load-balancers>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method updateLoadBalancer

<https://developers.digitalocean.com/documentation/v2/#update-a-load-balancer>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method deleteLoadBalancer

<https://developers.digitalocean.com/documentation/v2/#delete-a-load-balancer>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method addDroplets

<https://developers.digitalocean.com/documentation/v2/#add-droplets-to-a-load-balancer>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method removeDroplets

<https://developers.digitalocean.com/documentation/v2/#remove-droplets-from-a-load-balancer>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method addForwardingRules

<https://developers.digitalocean.com/documentation/v2/#add-forwarding-rules-to-a-load-balancer>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method removeForwardingRules

<https://developers.digitalocean.com/documentation/v2/#remove-forwarding-rules-from-a-load-balancer>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```


## class SnapshotsClient

### method getSnapshots

<https://developers.digitalocean.com/documentation/v2/#list-all-snapshots>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getDropletSnapshots

<https://developers.digitalocean.com/documentation/v2/#list-all-droplet-snapshots>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getVolumeSnapshots

<https://developers.digitalocean.com/documentation/v2/#list-all-volume-snapshots>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getSnapshotById

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-snapshot-by-id>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method deleteSnapshot

<https://developers.digitalocean.com/documentation/v2/#delete-a-snapshot>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```


## class SSHKeysClient

### method getKeys

<https://developers.digitalocean.com/documentation/v2/#list-all-keys>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method createKey

<https://developers.digitalocean.com/documentation/v2/#create-a-new-key>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getKeyById

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-key>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getKeyByFingerprint

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-key>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method updateKeyById

<https://developers.digitalocean.com/documentation/v2/#update-a-key>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method updateKeyByFingerprint

<https://developers.digitalocean.com/documentation/v2/#update-a-key>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method deleteKeyById (destroyKeyById))

<https://developers.digitalocean.com/documentation/v2/#destroy-a-key>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method deleteKeyByFingerprint (destroyKeyByFingerprint)

<https://developers.digitalocean.com/documentation/v2/#destroy-a-key>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```


## class RegionsClient

### method getRegions

<https://developers.digitalocean.com/documentation/v2/#list-all-regions>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```


## class SizesClient

### method getSizes

<https://developers.digitalocean.com/documentation/v2/#list-all-sizes>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```


## class FloatingIpsClient

### method getFloatingIps

<https://developers.digitalocean.com/documentation/v2/#list-all-floating-ips>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method createFloatingIp

<https://developers.digitalocean.com/documentation/v2/#create-a-new-floating-ip-assigned-to-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getFloatingIp

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-floating-ip>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method deleteFloatingIp

<https://developers.digitalocean.com/documentation/v2/#delete-a-floating-ips>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```


## class FloatingIpActionsClient

### method assignFloatingIp

<https://developers.digitalocean.com/documentation/v2/#assign-a-floating-ip-to-a-droplet>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method unassignFloatingIp

<https://developers.digitalocean.com/documentation/v2/#unassign-a-floating-ip>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getActions

<https://developers.digitalocean.com/documentation/v2/#list-all-actions-for-a-floating-ip>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getActionById

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-floating-ip-action>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```


## class TagsClient

### method createTag

<https://developers.digitalocean.com/documentation/v2/#create-a-new-tag>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getTag

<https://developers.digitalocean.com/documentation/v2/#retrieve-a-tag>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getTags

<https://developers.digitalocean.com/documentation/v2/#list-all-tags>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method tagResource

<https://developers.digitalocean.com/documentation/v2/#tag-a-resource>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method untagResource

<https://developers.digitalocean.com/documentation/v2/#untag-a-resource>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method deleteTag

<https://developers.digitalocean.com/documentation/v2/#delete-a-tag>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

