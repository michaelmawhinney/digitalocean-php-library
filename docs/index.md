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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```



<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getDropletActionsById

<>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getDropletBackupsById

<>

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

<>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getDropletByTag

<>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getDropletKernelsById

<>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getDropletNeighbors

<>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getDropletNeighborsById

<>

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

<>

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

<>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getDropletSnapshotsById

<>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getImages

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method getDropletSnapshot

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method deleteKeyById

<>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

### method deleteKeyByFingerprint

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

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

<>

```
$result = $client->->([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->->([
    '' => '<>' // REQUIRED
]);
```

