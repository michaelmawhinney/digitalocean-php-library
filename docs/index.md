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

<https://developers.digitalocean.com/documentation/v2/#get-user-information/>

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
### method createVolume
### method getVolumeById
### method getVolumeByName
### method getSnapshotsByVolumeId
### method createSnapshotByVolumeId
### method deleteVolumeById
### method deleteVolumeByName

## class BlockStorageActionsClient

### method attachVolumeById
### method attachVolumeByName
### method deleteVolumeById
### method deleteVolumeByName
### method resizeVolume
### method getVolumeActions
### method getVolumeAction

## class CertificatesClient

### method createCertificate
### method getCertificate
### method getCertificates
### method deleteCertificate

## class DomainsClient

### method getDomains
### method createDomain
### method getDomain
### method deleteDomain

## class DomainRecordsClient

### method getDomainRecords
### method createDomainRecord
### method getDomainRecord
### method updateDomainRecord
### method deleteDomainRecord

## class DropletClient

### method createDroplet
### method deleteDropletById
### method deleteDropletsByTag
### method getDropletActionsById
### method getDropletBackupsById
### method getDropletById
### method getDropletByTag
### method getDropletKernelsById
### method getDropletNeighbors
### method getDropletNeighborsById
### method getDroplets
### method getDropletsByTag
### method getDropletSnapshotsById
### method getImages

## class DropletActionsClient

### method enableBackups
### method disableBackups
### method reboot
### method powerCycle
### method shutdown
### method powerOff
### method powerOn
### method restore
### method resetPassword
### method resize
### method rebuild
### method rename
### method changeKernel
### method enableIPv6
### method enablePrivateNetworking
### method createSnapshot
### ~~method doActionByTag~~
### method getAction

## class ImagesClient

### method getImages
### method getDistributionImages
### method getApplicationImages
### method getUserImages
### method getActions
### method getImageById
### method getImageBySlug
### method updateImage
### method deleteImage

## class ImageActionsClient

### method transferImage
### method convertImageToSnapshot
### method getAction

## class LoadBalancersClient

### method createLoadBalancer
### method getLoadBalancer
### method getLoadBalancers
### method updateLoadBalancer
### method deleteLoadBalancer
### method addDroplets
### method removeDroplets
### method addForwardingRules
### method removeForwardingRules

## class SnapshotsClient

### method getSnapshots
### method getDropletSnapshot
### method getVolumeSnapshots
### method getSnapshotById
### method deleteSnapshot

## class SSHKeysClient

### method getKeys
### method createKey
### method getKeyById
### method getKeyByFingerprint
### method updateKeyById
### method updateKeyByFingerprint
### method deleteKeyById
### method deleteKeyByFingerprint

## class RegionsClient

### method getRegions

## class SizesClient

### method getSizes

## class FloatingIpsClient

### method getFloatingIps
### method createFloatingIp
### method getFloatingIp
### method deleteFloatingIp

## class FloatingIpActionsClient

### method assignFloatingIp
### method unassignFloatingIp
### method getActions
### method getActionById

## class TagsClient

### method createTag
### method getTag
### method getTags
### method tagResource
### method untagResource
### method deleteTag
