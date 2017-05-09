**DigitalOcean PHP Library** is a set of PHP classes designed to interact with the DigitalOcean API v2. The aim of this project is to create a simple library that can be included easily without an autoloader like Composer.

* TOC
{:toc}

# DigitalOceanClient

```
$client = new DigitalOceanClient([
    'access_token' => '<string>' // REQUIRED
]);
```

## AccountClient

### getUserInformation

```
$result = $client->Account->getUserInformation();
```

## ActionsClient

### getActions

```
$result = $client->Actions->getActions();
```

### getActionsById

```
$result = $client->Actions->getActionsById([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Actions->getActionById([
    'id' => '<string>' // REQUIRED
]);
```

## BlockStorageClient

### getVolumes
### createVolume
### getVolumeById
### getVolumeByName
### getSnapshotsByVolumeId
### createSnapshotByVolumeId
### deleteVolumeById
### deleteVolumeByName

## BlockStorageActionsClient

### attachVolumeById
### attachVolumeByName
### deleteVolumeById
### deleteVolumeByName
### resizeVolume
### getVolumeActions
### getVolumeAction

## CertificatesClient

### createCertificate
### getCertificate
### getCertificates
### deleteCertificate

## DomainsClient

### getDomains
### createDomain
### getDomain
### deleteDomain

## DomainRecordsClient

### getDomainRecords
### createDomainRecord
### getDomainRecord
### updateDomainRecord
### deleteDomainRecord

## DropletClient

### createDroplet
### deleteDropletById
### deleteDropletsByTag
### getDropletActionsById
### getDropletBackupsById
### getDropletById
### getDropletByTag
### getDropletKernelsById
### getDropletNeighbors
### getDropletNeighborsById
### getDroplets
### getDropletsByTag
### getDropletSnapshotsById
### getImages

## DropletActionsClient

### function enableBackups
### function disableBackups
### function reboot
### function powerCycle
### function shutdown
### function powerOff
### function powerOn
### function restore
### function resetPassword
### function resize
### function rebuild
### function rename
### function changeKernel
### function enableIPv6
### function enablePrivateNetworking
### function createSnapshot
### ~~function doActionByTag~~
### function getAction

## ImagesClient

### function getImages
### function getDistributionImages
### function getApplicationImages
### function getUserImages
### function getActions
### function getImageById
### function getImageBySlug
### function updateImage
### function deleteImage

## ImageActionsClient

### function transferImage
### function convertImageToSnapshot
### function getAction

## LoadBalancersClient

### function createLoadBalancer
### function getLoadBalancer
### function getLoadBalancers
### function updateLoadBalancer
### function deleteLoadBalancer
### function addDroplets
### function removeDroplets
### function addForwardingRules
### function removeForwardingRules

## SnapshotsClient

### function getSnapshots
### function getDropletSnapshot
### function getVolumeSnapshots
### function getSnapshotById
### function deleteSnapshot

## SSHKeysClient

### getKeys
### createKey
### getKeyById
### getKeyByFingerprint
### updateKeyById
### updateKeyByFingerprint
### deleteKeyById
### deleteKeyByFingerprint

## RegionsClient

### getRegions

## SizesClient

### getSizes

## FloatingIpsClient

### getFloatingIps
### createFloatingIp
### getFloatingIp
### deleteFloatingIp

## FloatingIpActionsClient

### assignFloatingIp
### unassignFloatingIp
### getActions
### getActionById

## TagsClient

### createTag
### getTag
### getTags
### tagResource
### untagResource
### deleteTag
