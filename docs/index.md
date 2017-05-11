**DigitalOcean PHP Library** is a set of PHP classes designed to interact with the DigitalOcean API v2. The aim of this project is to create a simple library that can be included easily without an autoloader like Composer.

# class DigitalOceanClient

*This main class can be used to load all the endpoint classes.*

```
$client = new DigitalOceanClient([
    'access_token' => '<string>' // REQUIRED
]);
```

# class AccountClient

*This class interacts with the `/v2/account/` endpoint.*

## method getUserInformation

<https://developers.digitalocean.com/documentation/v2/#get-user-information>

```
$result = $client->Account->getUserInformation();
```

# class ActionsClient

## method getActions

<https://developers.digitalocean.com/documentation/v2/#list-all-actions>

```
$result = $client->Actions->getActions();
```

## method getActionsById

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

# class BlockStorageClient

## method getVolumes

<https://developers.digitalocean.com/documentation/v2/#list-all-block-storage-volumes>

```
$result = $client->BlockStorage->getVolumes();
```

## method createVolume

<https://developers.digitalocean.com/documentation/v2/#create-a-new-block-storage-volume>

```
$result = $client->BlockStorage->createVolume([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->BlockStorage->createVolume([
    '' => '<>' // REQUIRED
]);
```

## method getVolumeById

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-block-storage-volume>

```
$result = $client->BlockStorage->getVolumeById([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->BlockStorage->getVolumeById([
    '' => '<>' // REQUIRED
]);
```

## method getVolumeByName

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-block-storage-volume-by-name>

```
$result = $client->BlockStorage->getVolumeByName([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->BlockStorage->getVolumeByName([
    '' => '<>' // REQUIRED
]);
```

## method getSnapshotsByVolumeId

<https://developers.digitalocean.com/documentation/v2/#list-snapshots-for-a-volume>

```
$result = $client->BlockStorage->getSnapshotsByVolumeId([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->BlockStorage->getSnapshotsByVolumeId([
    '' => '<>' // REQUIRED
]);
```

## method createSnapshotByVolumeId

<https://developers.digitalocean.com/documentation/v2/#create-snapshot-from-a-volume>

```
$result = $client->BlockStorage->createSnapshotByVolumeId([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->BlockStorage->createSnapshotByVolumeId([
    '' => '<>' // REQUIRED
]);
```

## method deleteVolumeById

<https://developers.digitalocean.com/documentation/v2/#delete-a-block-storage-volume>

```
$result = $client->BlockStorage->deleteVolumeById([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->BlockStorage->deleteVolumeById([
    '' => '<>' // REQUIRED
]);
```

## method deleteVolumeByName

<https://developers.digitalocean.com/documentation/v2/#delete-a-block-storage-volume-by-name>

```
$result = $client->BlockStorage->deleteVolumeByName([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->BlockStorage->deleteVolumeByName([
    '' => '<>' // REQUIRED
]);
```


# class BlockStorageActionsClient

## method attachVolumeById

<https://developers.digitalocean.com/documentation/v2/#attach-a-block-storage-volume-to-a-droplet>

```
$result = $client->BlockStorageActions->attachVolumeById([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->BlockStorageActions->attachVolumeById([
    '' => '<>' // REQUIRED
]);
```

## method attachVolumeByName

<https://developers.digitalocean.com/documentation/v2/#attach-a-block-storage-volume-to-a-droplet-by-name>

```
$result = $client->BlockStorageActions->attachVolumeByName([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->BlockStorageActions->attachVolumeByName([
    '' => '<>' // REQUIRED
]);
```

## method deleteVolumeById

<https://developers.digitalocean.com/documentation/v2/#remove-a-block-storage-volume-from-a-droplet>

```
$result = $client->BlockStorageActions->deleteVolumeById([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->BlockStorageActions->deleteVolumeById([
    '' => '<>' // REQUIRED
]);
```

## method deleteVolumeByName

<https://developers.digitalocean.com/documentation/v2/#remove-a-block-storage-volume-from-a-droplet-by-name>

```
$result = $client->BlockStorageActions->deleteVolumeByName([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->BlockStorageActions->deleteVolumeByName([
    '' => '<>' // REQUIRED
]);
```

## method resizeVolume

<https://developers.digitalocean.com/documentation/v2/#resize-a-volume>

```
$result = $client->BlockStorageActions->resizeVolume([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->BlockStorageActions->resizeVolume([
    '' => '<>' // REQUIRED
]);
```

## method getVolumeActions

https://developers.digitalocean.com/documentation/v2/#list-all-actions-for-a-volume<>

```
$result = $client->BlockStorageActions->getVolumeActions([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->BlockStorageActions->getVolumeActions([
    '' => '<>' // REQUIRED
]);
```

## method getVolumeAction

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-volume-action>

```
$result = $client->BlockStorageActions->getVolumeAction([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->BlockStorageActions->getVolumeAction([
    '' => '<>' // REQUIRED
]);
```

# class CertificatesClient

## method createCertificate

<https://developers.digitalocean.com/documentation/v2/#create-a-new-certificate>

```
$result = $client->Certificates->createCertificate([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Certificates->createCertificate([
    '' => '<>' // REQUIRED
]);
```

## method getCertificate

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-certificate>

```
$result = $client->Certificates->getCertificate([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Certificates->getCertificate([
    '' => '<>' // REQUIRED
]);
```

## method getCertificates

<https://developers.digitalocean.com/documentation/v2/#list-all-certificates>

```
$result = $client->Certificates->getCertificates();
```

## method deleteCertificate

<https://developers.digitalocean.com/documentation/v2/#delete-a-certificate>

```
$result = $client->Certificates->deleteCertificate([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Certificates->deleteCertificate([
    '' => '<>' // REQUIRED
]);
```


# class DomainsClient

## method getDomains

<https://developers.digitalocean.com/documentation/v2/#list-all-domains>

```
$result = $client->Domains->getDomains();
```

## method createDomain

<https://developers.digitalocean.com/documentation/v2/#create-a-new-domain>

```
$result = $client->Domains->createDomain([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Domains->createDomain([
    '' => '<>' // REQUIRED
]);
```

## method getDomain

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-domain>

```
$result = $client->Domains->getDomain([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Domains->getDomain([
    '' => '<>' // REQUIRED
]);
```

## method deleteDomain

<https://developers.digitalocean.com/documentation/v2/#delete-a-domain>

```
$result = $client->Domains->deleteDomain([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Domains->deleteDomain([
    '' => '<>' // REQUIRED
]);
```


# class DomainRecordsClient

## method getDomainRecords

<https://developers.digitalocean.com/documentation/v2/#list-all-domain-records>

```
$result = $client->DomainRecords->getDomainRecords([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DomainRecords->getDomainRecords([
    '' => '<>' // REQUIRED
]);
```

## method createDomainRecord

<https://developers.digitalocean.com/documentation/v2/#create-a-new-domain-record>

```
$result = $client->DomainRecords->createDomainRecord([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DomainRecords->createDomainRecord([
    '' => '<>' // REQUIRED
]);
```

## method getDomainRecord

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-domain-record>

```
$result = $client->DomainRecords->getDomainRecord([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DomainRecords->getDomainRecord([
    '' => '<>' // REQUIRED
]);
```

## method updateDomainRecord

<https://developers.digitalocean.com/documentation/v2/#update-a-domain-record>

```
$result = $client->DomainRecords->updateDomainRecord([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DomainRecords->updateDomainRecord([
    '' => '<>' // REQUIRED
]);
```

## method deleteDomainRecord

<https://developers.digitalocean.com/documentation/v2/#delete-a-domain-record>

```
$result = $client->DomainRecords->deleteDomainRecord([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DomainRecords->deleteDomainRecord([
    '' => '<>' // REQUIRED
]);
```

# class DropletsClient

## method createDroplet

<https://developers.digitalocean.com/documentation/v2/#create-a-new-droplet>

```
$result = $client->Droplets->createDroplet([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Droplets->createDroplet([
    '' => '<>' // REQUIRED
]);
```

## method getDropletById

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-droplet-by-id>

```
$result = $client->Droplets->getDropletById([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Droplets->getDropletById([
    '' => '<>' // REQUIRED
]);
```

## method getDroplets

<https://developers.digitalocean.com/documentation/v2/#list-all-droplets>

```
$result = $client->Droplets->getDroplets();
```

## method getDropletsByTag

<https://developers.digitalocean.com/documentation/v2/#listing-droplets-by-tag>

```
$result = $client->Droplets->getDropletsByTag([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Droplets->getDropletsByTag([
    '' => '<>' // REQUIRED
]);
```

## method getKernelsByDropletId

<https://developers.digitalocean.com/documentation/v2/#list-all-available-kernels-for-a-droplet>

```
$result = $client->Droplets->getKernelsByDropletId([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Droplets->getKernelsByDropletId([
    '' => '<>' // REQUIRED
]);
```

## method getSnapshotsByDropletId

<https://developers.digitalocean.com/documentation/v2/#list-snapshots-for-a-droplet>

```
$result = $client->Droplets->getSnapshotsByDropletId([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Droplets->getSnapshotsByDropletId([
    '' => '<>' // REQUIRED
]);
```

## method getBackupsByDropletId

<https://developers.digitalocean.com/documentation/v2/#list-backups-for-a-droplet>

```
$result = $client->Droplets->getBackupsByDropletId([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Droplets->getBackupsByDropletId([
    '' => '<>' // REQUIRED
]);
```

## method getActionsByDropletId

<https://developers.digitalocean.com/documentation/v2/#list-actions-for-a-droplet>

```
$result = $client->Droplets->getActionsByDropletId([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Droplets->getActionsByDropletId([
    '' => '<>' // REQUIRED
]);
```

## method deleteDropletById

<https://developers.digitalocean.com/documentation/v2/#delete-a-droplet>

```
$result = $client->Droplets->deleteDropletById([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Droplets->deleteDropletById([
    '' => '<>' // REQUIRED
]);
```

## method deleteDropletsByTag

<https://developers.digitalocean.com/documentation/v2/#deleting-droplets-by-tag>

```
$result = $client->Droplets->deleteDropletsByTag([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Droplets->deleteDropletsByTag([
    '' => '<>' // REQUIRED
]);
```

## method getNeighborsByDropletId

<https://developers.digitalocean.com/documentation/v2/#list-neighbors-for-a-droplet>

```
$result = $client->Droplets->getNeighborsByDropletId([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Droplets->getNeighborsByDropletId([
    '' => '<>' // REQUIRED
]);
```

## method getNeighbors

<https://developers.digitalocean.com/documentation/v2/#list-all-droplet-neighbors>

```
$result = $client->Droplets->getNeighbors();
```

# class DropletActionsClient

## method enableBackups

<https://developers.digitalocean.com/documentation/v2/#enable-backups>

```
$result = $client->DropletActions->enableBackups([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DropletActions->enableBackups([
    '' => '<>' // REQUIRED
]);
```

## method disableBackups

<https://developers.digitalocean.com/documentation/v2/#disable-backups>

```
$result = $client->DropletActions->disableBackups([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DropletActions->disableBackups([
    '' => '<>' // REQUIRED
]);
```

## method reboot

<https://developers.digitalocean.com/documentation/v2/#reboot-a-droplet>

```
$result = $client->DropletActions->reboot([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DropletActions->reboot([
    '' => '<>' // REQUIRED
]);
```

## method powerCycle

<https://developers.digitalocean.com/documentation/v2/#power-cycle-a-droplet>

```
$result = $client->DropletActions->powerCycle([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DropletActions->powerCycle([
    '' => '<>' // REQUIRED
]);
```

## method shutdown

<https://developers.digitalocean.com/documentation/v2/#shutdown-a-droplet>

```
$result = $client->DropletActions->shutdown([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DropletActions->shutdown([
    '' => '<>' // REQUIRED
]);
```

## method powerOff

<https://developers.digitalocean.com/documentation/v2/#power-off-a-droplet>

```
$result = $client->DropletActions->powerOff([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DropletActions->powerOff([
    '' => '<>' // REQUIRED
]);
```

## method powerOn

<https://developers.digitalocean.com/documentation/v2/#power-on-a-droplet>

```
$result = $client->DropletActions->powerOn([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DropletActions->powerOn([
    '' => '<>' // REQUIRED
]);
```

## method restore

<https://developers.digitalocean.com/documentation/v2/#restore-a-droplet>

```
$result = $client->DropletActions->restore([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DropletActions->restore([
    '' => '<>' // REQUIRED
]);
```

## method resetPassword

<https://developers.digitalocean.com/documentation/v2/#password-reset-a-droplet>

```
$result = $client->DropletActions->resetPassword([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DropletActions->resetPassword([
    '' => '<>' // REQUIRED
]);
```

## method resize

<https://developers.digitalocean.com/documentation/v2/#resize-a-droplet>

```
$result = $client->DropletActions->resize([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DropletActions->resize([
    '' => '<>' // REQUIRED
]);
```

## method rebuild

<https://developers.digitalocean.com/documentation/v2/#rebuild-a-droplet>

```
$result = $client->DropletActions->rebuild([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DropletActions->rebuild([
    '' => '<>' // REQUIRED
]);
```

## method rename

<https://developers.digitalocean.com/documentation/v2/#rename-a-droplet>

```
$result = $client->DropletActions->rename([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DropletActions->rename([
    '' => '<>' // REQUIRED
]);
```

## method changeKernel

<https://developers.digitalocean.com/documentation/v2/#change-the-kernel>

```
$result = $client->DropletActions->changeKernel([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DropletActions->changeKernel([
    '' => '<>' // REQUIRED
]);
```

## method enableIPv6

<https://developers.digitalocean.com/documentation/v2/#enable-ipv6>

```
$result = $client->DropletActions->enableIPv6([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DropletActions->enableIPv6([
    '' => '<>' // REQUIRED
]);
```

## method enablePrivateNetworking

<https://developers.digitalocean.com/documentation/v2/#enable-private-networking>

```
$result = $client->DropletActions->enablePrivateNetworking([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DropletActions->enablePrivateNetworking([
    '' => '<>' // REQUIRED
]);
```

## method createSnapshot

<https://developers.digitalocean.com/documentation/v2/#snapshot-a-droplet>

```
$result = $client->DropletActions->createSnapshot([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DropletActions->createSnapshot([
    '' => '<>' // REQUIRED
]);
```

### ~~method doActionByTag~~

<https://developers.digitalocean.com/documentation/v2/#acting-on-tagged-droplets>

```
$result = $client->DropletActions->doActionByTag([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DropletActions->doActionByTag([
    '' => '<>' // REQUIRED
]);
```

## method getAction

<https://developers.digitalocean.com/documentation/v2/#retrieve-a-droplet-action>

```
$result = $client->DropletActions->getAction([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->DropletActions->getAction([
    '' => '<>' // REQUIRED
]);
```


# class ImagesClient

## method getImages

<https://developers.digitalocean.com/documentation/v2/#list-all-images>

```
$result = $client->Images->getImages();
```

## method getDistributionImages

<https://developers.digitalocean.com/documentation/v2/#list-all-distribution-images>

```
$result = $client->Images->getDistributionImages();
```

## method getApplicationImages

<https://developers.digitalocean.com/documentation/v2/#list-all-application-images>

```
$result = $client->Images->getApplicationImages();
```

## method getUserImages

<https://developers.digitalocean.com/documentation/v2/#list-a-user-s-images>

```
$result = $client->Images->getUserImages();
```

## method getActions

<https://developers.digitalocean.com/documentation/v2/#list-all-actions-for-an-image>

```
$result = $client->Images->getActions([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Images->getActions([
    '' => '<>' // REQUIRED
]);
```

## method getImageById

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-image-by-id>

```
$result = $client->Images->getImageById([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Images->getImageById([
    '' => '<>' // REQUIRED
]);
```

## method getImageBySlug

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-image-by-slug>

```
$result = $client->Images->getImageBySlug([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Images->getImageBySlug([
    '' => '<>' // REQUIRED
]);
```

## method updateImage

<https://developers.digitalocean.com/documentation/v2/#update-an-image>

```
$result = $client->Images->updateImage([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Images->updateImage([
    '' => '<>' // REQUIRED
]);
```

## method deleteImage

<https://developers.digitalocean.com/documentation/v2/#delete-an-image>

```
$result = $client->Images->deleteImage([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Images->deleteImage([
    '' => '<>' // REQUIRED
]);
```


# class ImageActionsClient

## method transferImage

<https://developers.digitalocean.com/documentation/v2/#transfer-an-image>

```
$result = $client->ImageActions->transferImage([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->ImageActions->transferImage([
    '' => '<>' // REQUIRED
]);
```

## method convertImageToSnapshot

<https://developers.digitalocean.com/documentation/v2/#convert-an-image-to-a-snapshot>

```
$result = $client->ImageActions->convertImageToSnapshot([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->ImageActions->convertImageToSnapshot([
    '' => '<>' // REQUIRED
]);
```

## method getAction

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-image-action>

```
$result = $client->ImageActions->getAction([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->ImageActions->getAction([
    '' => '<>' // REQUIRED
]);
```


# class LoadBalancersClient

## method createLoadBalancer

<https://developers.digitalocean.com/documentation/v2/#create-a-new-load-balancer>

```
$result = $client->LoadBalancers->createLoadBalancer([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->LoadBalancers->createLoadBalancer([
    '' => '<>' // REQUIRED
]);
```

## method getLoadBalancer

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-load-balancer>

```
$result = $client->LoadBalancers->getLoadBalancer([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->LoadBalancers->getLoadBalancer([
    '' => '<>' // REQUIRED
]);
```

## method getLoadBalancers

<https://developers.digitalocean.com/documentation/v2/#list-all-load-balancers>

```
$result = $client->LoadBalancers->getLoadBalancers();
```

## method updateLoadBalancer

<https://developers.digitalocean.com/documentation/v2/#update-a-load-balancer>

```
$result = $client->LoadBalancers->updateLoadBalancer([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->LoadBalancers->updateLoadBalancer([
    '' => '<>' // REQUIRED
]);
```

## method deleteLoadBalancer

<https://developers.digitalocean.com/documentation/v2/#delete-a-load-balancer>

```
$result = $client->LoadBalancers->deleteLoadBalancer([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->LoadBalancers->deleteLoadBalancer([
    '' => '<>' // REQUIRED
]);
```

## method addDroplets

<https://developers.digitalocean.com/documentation/v2/#add-droplets-to-a-load-balancer>

```
$result = $client->LoadBalancers->addDroplets([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->LoadBalancers->addDroplets([
    '' => '<>' // REQUIRED
]);
```

## method removeDroplets

<https://developers.digitalocean.com/documentation/v2/#remove-droplets-from-a-load-balancer>

```
$result = $client->LoadBalancers->removeDroplets([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->LoadBalancers->removeDroplets([
    '' => '<>' // REQUIRED
]);
```

## method addForwardingRules

<https://developers.digitalocean.com/documentation/v2/#add-forwarding-rules-to-a-load-balancer>

```
$result = $client->LoadBalancers->addForwardingRules([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->LoadBalancers->addForwardingRules([
    '' => '<>' // REQUIRED
]);
```

## method removeForwardingRules

<https://developers.digitalocean.com/documentation/v2/#remove-forwarding-rules-from-a-load-balancer>

```
$result = $client->LoadBalancers->removeForwardingRules([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->LoadBalancers->removeForwardingRules([
    '' => '<>' // REQUIRED
]);
```


# class SnapshotsClient

## method getSnapshots

<https://developers.digitalocean.com/documentation/v2/#list-all-snapshots>

```
$result = $client->Snapshots->getSnapshots();
```

## method getDropletSnapshots

<https://developers.digitalocean.com/documentation/v2/#list-all-droplet-snapshots>

```
$result = $client->Snapshots->getDropletSnapshots();
```

## method getVolumeSnapshots

<https://developers.digitalocean.com/documentation/v2/#list-all-volume-snapshots>

```
$result = $client->Snapshots->getVolumeSnapshots();
```

## method getSnapshotById

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-snapshot-by-id>

```
$result = $client->Snapshots->getSnapshotById([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Snapshots->getSnapshotById([
    '' => '<>' // REQUIRED
]);
```

## method deleteSnapshot

<https://developers.digitalocean.com/documentation/v2/#delete-a-snapshot>

```
$result = $client->Snapshots->deleteSnapshot([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Snapshots->deleteSnapshot([
    '' => '<>' // REQUIRED
]);
```


# class SSHKeysClient

## method getKeys

<https://developers.digitalocean.com/documentation/v2/#list-all-keys>

```
$result = $client->SSHKeys->getKeys();
```

## method createKey

<https://developers.digitalocean.com/documentation/v2/#create-a-new-key>

```
$result = $client->SSHKeys->createKey([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->SSHKeys->createKey([
    '' => '<>' // REQUIRED
]);
```

## method getKeyById

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-key>

```
$result = $client->SSHKeys->getKeyById([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->SSHKeys->getKeyById([
    '' => '<>' // REQUIRED
]);
```

## method getKeyByFingerprint

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-key>

```
$result = $client->SSHKeys->getKeyByFingerprint([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->SSHKeys->getKeyByFingerprint([
    '' => '<>' // REQUIRED
]);
```

## method updateKeyById

<https://developers.digitalocean.com/documentation/v2/#update-a-key>

```
$result = $client->SSHKeys->updateKeyById([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->SSHKeys->updateKeyById([
    '' => '<>' // REQUIRED
]);
```

## method updateKeyByFingerprint

<https://developers.digitalocean.com/documentation/v2/#update-a-key>

```
$result = $client->SSHKeys->updateKeyByFingerprint([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->SSHKeys->updateKeyByFingerprint([
    '' => '<>' // REQUIRED
]);
```

## method deleteKeyById (destroyKeyById))

<https://developers.digitalocean.com/documentation/v2/#destroy-a-key>

```
$result = $client->SSHKeys->deleteKeyById([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->SSHKeys->deleteKeyById([
    '' => '<>' // REQUIRED
]);
```

## method deleteKeyByFingerprint (destroyKeyByFingerprint)

<https://developers.digitalocean.com/documentation/v2/#destroy-a-key>

```
$result = $client->SSHKeys->deleteKeyByFingerprint([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->SSHKeys->deleteKeyByFingerprint([
    '' => '<>' // REQUIRED
]);
```


# class RegionsClient

## method getRegions

<https://developers.digitalocean.com/documentation/v2/#list-all-regions>

```
$result = $client->Regions->getRegions();
```

# class SizesClient

## method getSizes

<https://developers.digitalocean.com/documentation/v2/#list-all-sizes>

```
$result = $client->Sizes->getSizes();
```

# class FloatingIpsClient

## method getFloatingIps

<https://developers.digitalocean.com/documentation/v2/#list-all-floating-ips>

```
$result = $client->FloatingIps->getFloatingIps();
```

## method createFloatingIp

<https://developers.digitalocean.com/documentation/v2/#create-a-new-floating-ip-assigned-to-a-droplet>

```
$result = $client->FloatingIps->createFloatingIp([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->FloatingIps->createFloatingIp([
    '' => '<>' // REQUIRED
]);
```

## method getFloatingIp

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-floating-ip>

```
$result = $client->FloatingIps->getFloatingIp([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->FloatingIps->getFloatingIp([
    '' => '<>' // REQUIRED
]);
```

## method deleteFloatingIp

<https://developers.digitalocean.com/documentation/v2/#delete-a-floating-ips>

```
$result = $client->FloatingIps->deleteFloatingIp([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->FloatingIps->deleteFloatingIp([
    '' => '<>' // REQUIRED
]);
```


# class FloatingIpActionsClient

## method assignFloatingIp

<https://developers.digitalocean.com/documentation/v2/#assign-a-floating-ip-to-a-droplet>

```
$result = $client->FloatingIpActions->assignFloatingIp([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->FloatingIpActions->assignFloatingIp([
    '' => '<>' // REQUIRED
]);
```

## method unassignFloatingIp

<https://developers.digitalocean.com/documentation/v2/#unassign-a-floating-ip>

```
$result = $client->FloatingIpActions->unassignFloatingIp([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->FloatingIpActions->unassignFloatingIp([
    '' => '<>' // REQUIRED
]);
```

## method getActions

<https://developers.digitalocean.com/documentation/v2/#list-all-actions-for-a-floating-ip>

```
$result = $client->FloatingIpActions->getActions([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->FloatingIpActions->getActions([
    '' => '<>' // REQUIRED
]);
```

## method getActionById

<https://developers.digitalocean.com/documentation/v2/#retrieve-an-existing-floating-ip-action>

```
$result = $client->FloatingIpActions->getActionById([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->FloatingIpActions->getActionById([
    '' => '<>' // REQUIRED
]);
```


# class TagsClient

## method createTag

<https://developers.digitalocean.com/documentation/v2/#create-a-new-tag>

```
$result = $client->Tags->createTag([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Tags->createTag([
    '' => '<>' // REQUIRED
]);
```

## method getTag

<https://developers.digitalocean.com/documentation/v2/#retrieve-a-tag>

```
$result = $client->Tags->getTag([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Tags->getTag([
    '' => '<>' // REQUIRED
]);
```

## method getTags

<https://developers.digitalocean.com/documentation/v2/#list-all-tags>

```
$result = $client->Tags->getTags();
```

## method tagResource

<https://developers.digitalocean.com/documentation/v2/#tag-a-resource>

```
$result = $client->Tags->tagResource([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Tags->tagResource([
    '' => '<>' // REQUIRED
]);
```

## method untagResource

<https://developers.digitalocean.com/documentation/v2/#untag-a-resource>

```
$result = $client->Tags->untagResource([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Tags->untagResource([
    '' => '<>' // REQUIRED
]);
```

## method deleteTag

<https://developers.digitalocean.com/documentation/v2/#delete-a-tag>

```
$result = $client->Tags->deleteTag([/* ... */]);
```

#### Parameter Syntax

```
$result = $client->Tags->deleteTag([
    '' => '<>' // REQUIRED
]);
```

