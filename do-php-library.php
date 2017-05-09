<?php
/**
 * DigitalOcean API v2 PHP Library
 * https://github.com/michaelmawhinney/do-php-library
 * (c) Michael R Mawhinney Jr
 */

class DigitalOceanClient
{
    const API_BASE_URL = "https://api.digitalocean.com/v2/";
    public $Account;
    public $Actions;
    public $BlockStorage;
    public $BlockStorageActions;
    public $Certificates;
    public $Domains;
    public $DomainRecords;
    public $Droplets;
    public $DropletActions;
    public $Images;
    public $ImageActions;
    public $LoadBalancers;
    public $Snapshots;
    public $SSHKeys;
    public $Regions;
    public $Sizes;
    public $FloatingIps;
    public $FloatingIpActions;
    public $Tags;

    public function __construct(array $config)
    {
        $this->Account = new AccountClient($config);
        $this->Actions = new ActionsClient($config);
        $this->BlockStorage = new BlockStorageClient($config);
        $this->BlockStorageActions = new BlockStorageActionsClient($config);
        $this->Certificates = new CertificatesClient($config);
        $this->Domains = new DomainsClient($config);
        $this->DomainRecords = new DomainRecordsClient($config);
        $this->Droplets = new DropletsClient($config);
        $this->DropletActions = new DropletActionsClient($config);
        $this->Images = new ImagesClient($config);
        $this->ImageActions = new ImageActionsClient($config);
        $this->LoadBalancers = new LoadBalancersClient($config);
        $this->Snapshots = new SnapshotsClient($config);
        $this->SSHKeys = new SSHKeysClient($config);
        $this->Regions = new RegionsClient($config);
        $this->Sizes = new SizesClient($config);
        $this->FloatingIps = new FloatingIpsClient($config);
        $this->FloatingIpActions = new FloatingIpActionsClient($config);
        $this->Tags = new TagsClient($config);
    }
}

abstract class EndpointClient
{
    protected $curl_handle;
    protected $access_token;
    protected $html_headers;

    protected function init(array $config)
    {
        $this->access_token = $config["access_token"];
        $this->html_headers[] = "Content-type: application/json";
        $this->html_headers[] = "Authorization: Bearer " . $this->access_token;
    }

    protected function doCurl(string $method, string $endpoint, array $args = null)
    {
        $this->curl_handle = curl_init();
        curl_setopt($this->curl_handle, CURLOPT_HTTPHEADER, $this->html_headers);
        curl_setopt($this->curl_handle, CURLOPT_URL, DigitalOceanClient::API_BASE_URL.$endpoint);
        curl_setopt($this->curl_handle, CURLOPT_RETURNTRANSFER, true);

        switch($method) {
            case "DELETE":
            case "PUT":
                curl_setopt($this->curl_handle, CURLOPT_CUSTOMREQUEST, $method);
                curl_setopt($this->curl_handle, CURLOPT_POSTFIELDS, json_encode($args));
                break;
            case "GET":
                break;
            case "HEAD":
                curl_setopt($this->curl_handle, CURLOPT_NOBODY, true);
                break;
            case "POST":
                curl_setopt($this->curl_handle, CURLOPT_POST, true);
                curl_setopt($this->curl_handle, CURLOPT_POSTFIELDS, json_encode($args));
                break;
            default:
                throw new Exception("Library Error: Unknown HTTP Verb: $method");
                return false;
        }

        $curl_response = curl_exec($this->curl_handle);
        $return_response = json_decode($curl_response, true);

        if( $curl_response === false || curl_errno($this->curl_handle)!== 0 ) {
            throw new Exception("cURL Error: " . curl_error($this->curl_handle));
            $return_response = false;
        }
        else if( isset($return_response["id"]) && $return_response["id"]=="unauthorized" ) {
            throw new Exception("API Error: " . $return_response["message"]);
            $return_response = false;
        }
        else if( $method == "DELETE" ) {
            $http_response = $this->getLastHttpResponse();
            if ($http_response >= 200 && $http_response < 300) {
                $return_response = true;
            } else {
                throw new Exception("API Error: HTTP code " . $curl_response);
                $return_response = false;
            }
        }
        else 
        {
            /* do nothing */
        }

        curl_close($this->curl_handle);
        $this->curl_handle = null;
        return $return_response;
    }

    protected function getLastHttpResponse()
    {
        $info = curl_getinfo($this->curl_handle);
        return $info["http_code"];
    }
}

class AccountClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function getUserInformation()
    {
        $response = $this->doCurl("GET", "account");
        return $response;
    }
}

class ActionsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function getActions()
    {
        $response = $this->doCurl("GET", "actions");
        return $response;
    }

    public function getActionById(array $attributes)
    {
        $action_id = $attributes['action_id'];
        $response = $this->doCurl("GET", "actions/$action_id");
        return $response;       
    }
}

class BlockStorageClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function getVolumes()
    {
        $response = $this->doCurl("GET", "volumes");
        return $response;
    }

    public function createVolume(array $attributes)
    {
        $response = $this->doCurl("POST", "volumes", $attributes);
        return $response;
    }

    public function getVolumeById(array $attributes)
    {
        $volume_id = $attributes['volume_id'];
        $response = $this->doCurl("GET", "volumes/$volume_id");
        return $response;
    }

    public function getVolumeByName(array $attributes)
    {
        $drive_name = $attributes['drive_name'];
        $region = $attributes['region'];
        $response = $this->doCurl("GET", "volumes?name=$drive_name&reion=$region");
        return $response;
    }

    public function getSnapshotsByVolumeId(array $attributes)
    {
        $volume_id = $attributes['volume_id'];
        $response = $this->doCurl("GET", "volumes/$volume_id/snapshots");
        return $response;
    }

    public function createSnapshotByVolumeId(array $attributes)
    {
        $volume_id = $attributes['volume_id'];
        $response = $this->doCurl("POST", "volumes/$volume_id/snapshots", $attributes);
        return $response;
    }

    public function deleteVolumeById(array $attributes)
    {
        $volume_id = $attributes['volume_id'];
        $response = $this->doCurl("DELETE", "volumes/$volume_id");
        return $response;
    }

    public function deleteVolumeByName(array $attributes)
    {
        $drive_name = $attributes['drive_name'];
        $region = $attributes['region'];
        $response = $this->doCurl("DELETE", "volumes?name=$drive_name&region=$region");
        return $response;
    }
}

class BlockStorageActionsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function attachVolumeById(array $attributes)
    {
        $volume_id = $attributes['volume_id'];
        $response = $this->doCurl("POST", "volumes/$volume_id/actions", $attributes);
        return $response;
    }

    public function attachVolumeByName(array $attributes)
    {
        $response = $this->doCurl("POST", "volumes/actions", $attributes);
        return $response;
    }

    public function deleteVolumeById(array $attributes)
    {
        $volume_id = $attributes['volume_id'];
        $response = $this->doCurl("POST", "volumes/$volume_id/actions", $attributes);
        return $response;
    }

    public function deleteVolumeByName(array $attributes)
    {
        $response = $this->doCurl("POST", "volumes/actions", $attributes);
        return $response;
    }

    public function resizeVolume(array $attributes)
    {
        $volume_id = $attributes['volume_id'];
        $response = $this->doCurl("POST", "volumes/$volume_id/actions", $attributes);
        return $response;
    }

    public function getVolumeActions(array $attributes)
    {
        $volume_id = $attributes['volume_id'];
        $response = $this->doCurl("GET", "volumes/$volume_id/actions");
        return $response;
    }

    public function getVolumeAction(array $attributes)
    {
        $volume_id = $attributes['volume_id'];
        $action_id = $attributes['action_id'];
        $response = $this->doCurl("GET", "volumes/$volume_id/actions/$action_id");
        return $response;
    }
}

class CertificatesClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function createCertificate(array $attributes)
    {
        $response = $this->doCurl("POST", "certificates", $attributes);
        return $response;
    }

    public function getCertificate(array $attributes)
    {
        $certificate_id = $attributes['$certificate_id'];
        $response = $this->doCurl("GET", "certificates/$certificate_id");
        return $response;
    }

    public function getCertificates()
    {
        $response = $this->doCurl("GET", "certificates");
        return $response;
    }

    public function deleteCertificate(array $attributes)
    {
        $certificate_id = $attributes['$certificate_id'];
        $response = $this->doCurl("DELETE", "certificates/$certificate_id");
        return $response;
    }
}

class DomainsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function getDomains()
    {
        $response = $this->doCurl("GET", "domains");
        return $response;
    }

    public function createDomain(array $attributes)
    {
        $response = $this->doCurl("POST", "domains", $attributes);
        return $response;
    }

    public function getDomain(array $attributes)
    {
        $domain_name = $attributes['domain_name'];
        $response = $this->doCurl("GET", "domains/$domain_name");
        return $response;
    }

    public function deleteDomain(array $attributes)
    {
        $domain_name = $attributes['domain_name'];
        $response = $this->doCurl("DELETE", "domains/$domain_name");
        return $response;
    }
}

class DomainRecordsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function getDomainRecords(array $attributes)
    {
        $domain_name = $attributes['domain_name'];
        $response = $this->doCurl("GET", "domains/$domain_name/records");
        return $response;
    }

    public function createDomainRecord(array $attributes)
    {
        $domain_name = $attributes['domain_name'];
        $response = $this->doCurl("POST", "domains/$domain_name/records", $attributes);
        return $response;
    }

    public function getDomainRecord(array $attributes)
    {
        $domain_name = $attributes['domain_name'];
        $record_id = $attributes['record_id'];
        $response = $this->doCurl("GET", "domains/$domain_name/records/$record_id");
        return $response;
    }

    public function updateDomainRecord(array $attributes)
    {
        $domain_name = $attributes['domain_name'];
        $record_id = $attributes['record_id'];
        $response = $this->doCurl("PUT", "domains/$domain_name/records/$record_id", $attributes);
        return $response;
    }

    public function deleteDomainRecord(array $attributes)
    {
        $domain_name = $attributes['domain_name'];
        $record_id = $attributes['record_id'];
        $response = $this->doCurl("DELETE", "domains/$domain_name/records/$record_id");
        return $response;
    }
}

class DropletsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function createDroplet(array $attributes)
    {
        $response = $this->doCurl("POST", "droplets", $attributes);
        return $response;
    }

    public function deleteDropletById(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("DELETE", "droplets/$droplet_id");
        return $response;
    }

    public function deleteDropletsByTag(array $attributes)
    {
        $tag_name = $attributes['tag_name'];
        $response = $this->doCurl("DELETE", "droplets?tag_name=$tag_name");
        return $response;
    }

    public function getDropletActionsById(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("GET", "droplets/$droplet_id/actions");
        return $response;
    }

    public function getDropletBackupsById(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("GET", "droplets/$droplet_id/backups");
        return $response;
    }

    public function getDropletById(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("GET", "droplets/$sroplet_id");
        return $response;
    }

    public function getDropletByTag(array $attributes)
    {
        $tag_name = $attributes['tag_name'];
        $response = $this->doCurl("GET", "droplets?tag_name=$tag_name");
        return $response;
    }

    public function getDropletKernelsById(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("GET", "droplets/$droplet_id/kernels");
        return $response;
    }

    public function getDropletNeighbors()
    {
        $response = $this->doCurl("GET", "reports/droplet_neighbors");
        return $response;
    }

    public function getDropletNeighborsById(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("GET", "droplets/$droplet_id/neighbors");
        return $response;
    }

    public function getDroplets()        
    {
        $response = $this->doCurl("GET", "droplets");
        return $response;
    }

    public function getDropletsByTag(array $attributes)
    {
        $tag_name = $attributes['tag_name'];
        $response = $this->doCurl("GET", "droplets?tag_name=$tag_name");
        return $response;
    }

    public function getDropletSnapshotsById(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("GET", "droplets/$droplet_id/snapshots");
        return $response;
    }

    public function getImages()        
    {
        $response = $this->doCurl("GET", "images");
        return $response;
    }
}

class DropletActionsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function enableBackups(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function disableBackups(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function reboot(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function powerCycle(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function shutdown(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function powerOff(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function powerOn(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function restore(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function resetPassword(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function resize(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function rebuild(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function rename(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function changeKernel(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function enableIPv6(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function enablePrivateNetworking(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function createSnapshot(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

//    public function doActionByTag($tag_name, $attributes)
//    {
//        $response = $this->doCurl("POST", "droplets/actions?tag_name=$tag_name", $attributes);
//        return $response;
//    }

    public function getAction(array $attributes)
    {
        $droplet_id = $attributes['droplet_id'];
        $action_id = $attributes['action_id'];
        $response = $this->doCurl("GET", "droplets/$droplet_id/actions/$action_id");
        return $response;
    }
}

class ImagesClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function getImages()
    {
        $response = $this->doCurl("GET", "images");
        return $response;
    }

    public function getDistributionImages()
    {
        $response = $this->doCurl("GET", "images?type=distribution");
        return $response;
    }

    public function getApplicationImages()
    {
        $response = $this->doCurl("GET", "images?type=application");
        return $response;
    }

    public function getUserImages()
    {
        $response = $this->doCurl("GET", "images?private=true");
        return $response;
    }

    public function getActions(array $attributes)
    {
        $image_id = $attributes['image_id'];
        $response = $this->doCurl("GET", "images/$image_id/actions");
        return $response;
    }

    public function getImageById(array $attributes)
    {
        $image_id = $attributes['image_id'];
        $response = $this->doCurl("GET", "images/$image_id");
        return $response;
    }

    public function getImageBySlug(array $attributes)
    {
        $image_slug = $attributes['image_slug'];
        $response = $this->doCurl("GET", "images/$image_slug");
        return $response;
    }

    public function updateImage(array $attributes)
    {
        $image_id = $attributes['image_id'];
        $response = $this->doCurl("PUT", "images/$image_id", $attributes);
        return $response;
    }

    public function deleteImage(array $attributes)
    {
        $image_id = $attributes['image_id'];
        $response = $this->doCurl("DELETE", "images/$image_id");
        return $response;
    }
}

class ImageActionsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function transferImage(array $attributes)
    {
        $image_id = $attributes['image_id'];
        $response = $this->doCurl("POST", "images/$image_id/actions", $attributes);
        return $response;
    }

    public function convertImageToSnapshot(array $attributes)
    {
        $image_id = $attributes['image_id'];
        $response = $this->doCurl("POST", "images/$image_id/actions", $attributes);
        return $response;
    }

    public function getAction(array $attributes)
    {
        $image_id = $attributes['image_id'];
        $action_id = $attributes['action_id'];
        $response = $this->doCurl("GET", "images/$image_id/actions/$action_id");
        return $response;
    }
}

class LoadBalancersClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    // need to ensure this can also create load balancers via tag
    public function createLoadBalancer(array $attributes)
    {
        $response = $this->doCurl("POST", "load_balancers", $attributes);
        return $response;
    }

    public function getLoadBalancer(array $attributes)
    {
        $load_balancer_id = $attributes['load_balancer_id'];
        $response = $this->doCurl("GET", "load_balancers/$load_balancer_id");
        return $response;
    }

    public function getLoadBalancers()
    {
        $response = $this->doCurl("GET", "load_balancers");
        return $response;
    }

    public function updateLoadBalancer(array $attributes)
    {
        $response = $this->doCurl("PUT", "load_balancers", $attributes);
        return $response;
    }

    public function deleteLoadBalancer(array $attributes)
    {
        $load_balancer_id = $attributes['load_balancer_id'];
        $response = $this->doCurl("DELETE", "load_balancers/$load_balancer_id");
        return $response;
    }

    public function addDroplets(array $attributes)
    {
        $load_balancer_id = $attributes['load_balancer_id'];
        $response = $this->doCurl("POST", "load_balancers/$load_balancer_id/droplets", $attributes);
        return $response;
    }

    public function removeDroplets(array $attributes)
    {
        $load_balancer_id = $attributes['load_balancer_id'];
        $response = $this->doCurl("DELETE", "load_balancers/$load_balancer_id/droplets", $attributes);
        return $response;
    }

    public function addForwardingRules(array $attributes)
    {
        $load_balancer_id = $attributes['load_balancer_id'];
        $response = $this->doCurl("POST", "load_balancers/$load_balancer_id/forwarding_rules", $attributes);
        return $response;
    }

    public function removeForwardingRules(array $attributes)
    {
        $load_balancer_id = $attributes['load_balancer_id'];
        $response = $this->doCurl("DELETE", "load_balancers/$load_balancer_id/forwarding_rules", $attributes);
        return $response;
    }
}

class SnapshotsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function getSnapshots()
    {
        $response = $this->doCurl("GET", "snapshots");
        return $response;
    }

    public function getDropletSnapshot()
    {
        $response = $this->doCurl("GET", "snapshots?resource_type=droplet");
        return $response;
    }

    public function getVolumeSnapshots()
    {
        $response = $this->doCurl("GET", "snapshots?resource_type=volume");
        return $response;
    }

    public function getSnapshotById(array $attributes)
    {
        $snapshot_id = $attributes['snapshot_id'];
        $response = $this->doCurl("GET", "snapshots/$snapshot_id");
        return $response;
    }

    public function deleteSnapshot(array $attributes)
    {
        $response = $this->doCurl("DELETE", "snapshots/$snapshot_id");
        return $response;
    }
}

class SSHKeysClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function getKeys()
    {
        $response = $this->doCurl("GET", "account/keys");
        return $response;
    }

    public function createKey(array $attributes)
    {
        $response = $this->doCurl("POST", "account/keys", $attributes);
        return $response;
    }

    public function getKeyById(array $attributes)
    {
        $key_id = $attributes['key_id'];
        $response = $this->doCurl("GET", "account/keys/$key_id");
        return $response;
    }

    public function getKeyByFingerprint(array $attributes)
    {
        $key_fingerprint = $attributes['key_fingerprint'];
        $response = $this->doCurl("GET", "account/keys/$key_fingerprint");
        return $response;
    }

    public function updateKeyById(array $attributes)
    {
        $key_id = $attributes['key_id'];
        $response = $this->doCurl("PUT", "account/keys/$key_id", $attributes);
        return $response;
    }

    public function updateKeyByFingerprint(array $attributes)
    {
        $key_fingerprint = $attributes['key_fingerprint'];
        $response = $this->doCurl("PUT", "account/keys/$key_fingerprint", $attributes);
        return $response;
    }

    public function deleteKeyById(array $attributes)
    {
        $key_id = $attributes['key_id'];
        $response = $this->doCurl("DELETE", "account/keys/$key_id");
        return $response;
    }

    public function deleteKeyByFingerprint(array $attributes)
    {
        $key_fingerprint = $attributes['key_fingerprint'];
        $response = $this->doCurl("DELETE", "account/keys/$key_fingerprint");
        return $response;
    }

    /**
     *  The API docs use the term "destroy" instead of "delete" for SSH keys.
     *  These functions were created as aliases to avoid potential confusion.
     */
    public function destroyKeyById(array $attributes)
    {
        return $this->deleteKeyById($attributes);
    }

    public function destroyKeyByFingerprint(array $attributes)
    {
        return $this->deleteKeyByFingerprint($attributes);
    }
}

class RegionsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function getRegions()
    {
        $response = $this->doCurl("GET", "regions");
        return $response;
    }
}

class SizesClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function getSizes()
    {
        $response = $this->doCurl("GET", "sizes");
        return $response;
    }
}

class FloatingIpsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function getFloatingIps()
    {
        $response = $this->doCurl("GET", "floating_ips");
        return $response;
    }

    public function createFloatingIp(array $attributes)
    {
        $response = $this->doCurl("POST", "floating_ips", $attributes);
        return $response;
    }

    public function getFloatingIp(array $attributes)
    {
        $ip_address = $attribute['ip_address'];
        $response = $this->doCurl("GET", "floating_ips/$ip_address");
        return $response;
    }

    public function deleteFloatingIp(array $attributes)
    {
        $ip_address = $attribute['ip_address'];
        $response = $this->doCurl("DELETE", "floating_ips/$ip_address");
        return $response;
    }
}

class FloatingIpActionsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function assignFloatingIp(array $attributes)
    {
        $ip_address = $attribute['ip_address'];
        $response = $this->doCurl("POST", "floating_ips/$ip_address/actions", $attributes);
        return $response;
    }

    public function unassignFloatingIp(array $attributes)
    {
        $ip_address = $attribute['ip_address'];
        $response = $this->doCurl("POST", "floating_ips/$ip_address/actions", $attributes);
        return $response;
    }

    public function getActions(array $attributes)
    {
        $ip_address = $attribute['ip_address'];
        $response = $this->doCurl("GET", "floating_ips/$ip_address/actions");
        return $response;
    }

    public function getActionById(array $attributes)
    {
        $ip_address = $attribute['ip_address'];
        $action_id = $attribute['action_id'];
        $response = $this->doCurl("GET", "floating_ips/$ip_address/actions/$action_id");
        return $response;
    }
}

class TagsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function createTag(array $attributes)
    {
        $response = $this->doCurl("POST", "tags", $attributes);
        return $response;
    }

    public function getTag(array $attributes)
    {
        $tag_name = $attributes['tag_name'];
        $response = $this->doCurl("GET", "tags/$tag_name");
        return $response;
    }

    public function getTags()
    {
        $response = $this->doCurl("GET", "tags");
        return $response;
    }

    public function tagResource(array $attributes)
    {
        $tag_name = $attributes['tag_name'];
        $response = $this->doCurl("POST", "tags/$tag_name/resources", $attributes);
        return $response;
    }

    public function untagResource(array $attributes)
    {
        $tag_name = $attributes['tag_name'];
        $response = $this->doCurl("DELETE", "tags/$tag_name/resources", $attributes);
        return $response;
    }

    public function deleteTag(array $attributes)
    {
        $tag_name = $attributes['tag_name'];
        $response = $this->doCurl("DELETE", "tags/$tag_name");
        return $response;
    }
}
