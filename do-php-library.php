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
    //public $LoadBalancers;
    //public $Snapshots;
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
        //$this->LoadBalancers = new LoadBalancersClient($config);
        //$this->Snapshots = new SnapshotsClient($config);
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

        $response = curl_exec($this->curl_handle);
        $response_array = json_decode($response, true);

        if( $response === false || curl_errno($this->curl_handle)!== 0 ) {
            throw new Exception("cURL Error: " . curl_error($this->curl_handle));
            return false;
        }

        if( isset($response_array["id"]) && $response_array["id"]=="unauthorized" ) {
            throw new Exception("API Error: " . $response_array["message"]);
            return false;
        }

        curl_close($this->curl_handle);
        $this->curl_handle = null;
        return $response_array;
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

    public function getActionById(int $id)
    {
        $response = $this->doCurl("GET", "actions/$id");
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

    public function getVolumeById(int $id)
    {
        $response = $this->doCurl("GET", "volumes/$id");
        return $response;
    }

    public function getVolumeByName(string $drive_name, string $region)
    {
        $response = $this->doCurl("GET", "volumes?name=$drive_name&reion=$region");
        return $response;
    }

    public function getSnapshotsByVolumeId(int $id)
    {
        $response = $this->doCurl("GET", "volumes/$id/snapshots");
        return $response;
    }

    public function createSnapshotByVolumeId(int $id, array $attributes = null)
    {
        $response = $this->doCurl("POST", "volumes/$id/snapshots", $attributes);
        return $response;
    }

    public function deleteVolumeById(int $id)
    {
        $response = $this->doCurl("DELETE", "volumes/$id");
        $response = $this->getLastHttpResponse();
        if ($response >= 200 && $response < 300) {
            return true;
        } else {
            throw new Exception("API Error: HTTP code " . $response);
            return false;
        }
    }

    public function deleteVolumeByName(string $drive_name, string $region)
    {
        $this->doCurl("DELETE", "volumes?name=$drive_name&region=$region");
        $response = $this->getLastHttpResponse();
        if ($response >= 200 && $response < 300) {
            return true;
        } else {
            throw new Exception("API Error: HTTP code " . $response);
            return false;
        }
    }
}

class BlockStorageActionsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function attachVolumeById(int $volume_id, array $attributes)
    {
        $response = $this->doCurl("POST", "volumes/$volume_id/actions", $attributes);
        return $response;
    }

    public function attachVolumeByName(array $attributes)
    {
        $response = $this->doCurl("POST", "volumes/actions", $attributes);
        return $response;
    }

    public function deleteVolumeById(int $volume_id, array $attributes)
    {
        $response = $this->doCurl("POST", "volumes/$volume_id/actions", $attributes);
        return $response;
    }

    public function deleteVolumeByName(array $attributes)
    {
        $response = $this->doCurl("POST", "volumes/actions", $attributes);
        return $response;
    }

    public function resizeVolume(int $volume_id, array $attributes)
    {
        $response = $this->doCurl("POST", "volumes/$volume_id/actions", $attributes);
        return $response;
    }

    public function getVolumeActions(int $volume_id)
    {
        $response = $this->doCurl("GET", "volumes/$volume_id/actions");
        return $response;
    }

    public function getVolumeAction(int $volume_id, int $action_id)
    {
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

    public function getCertificate(int $certificate_id)
    {
        $response = $this->doCurl("GET", "certificates/$certificate_id");
        return $response;
    }

    public function getCertificates()
    {
        $response = $this->doCurl("GET", "certificates");
        return $response;
    }

    public function deleteCertificate(int $certificate_id)
    {
        $this->doCurl("DELETE", "certificates/$certificate_id");
        $response = $this->getLastHttpResponse();
        if ($response >= 200 && $response < 300) {
            return true;
        } else {
            throw new Exception("API Error: " . $response );
            return false;
        }
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

    public function getDomain(string $domain_name)
    {
        $response = $this->doCurl("GET", "domains/$domain_name");
        return $response;
    }

    public function deleteDomain(string $domain_name)
    {
        $this->doCurl("DELETE", "domains/$domain_name");
        $response = $this->getLastHttpResponse();
        if ($response >= 200 && $response < 300) {
            return true;
        } else {
            throw new Exception("API Error: " . $response );
            return false;
        }
    }
}

class DomainRecordsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function getDomainRecords(string $domain_name)
    {
        $response = $this->doCurl("GET", "domains/$domain_name/records");
        return $response;
    }

    public function createDomainRecord(string $domain_name, array $attributes)
    {
        $response = $this->doCurl("POST", "domains/$domain_name/records", $attributes);
        return $response;
    }

    public function getDomainRecord(string $domain_name, int $record_id)
    {
        $response = $this->doCurl("GET", "domains/$domain_name/records/$record_id");
        return $response;
    }

    public function updateDomainRecord(string $domain_name, int $record_id, array $attributes)
    {
        $response = $this->doCurl("PUT", "domains/$domain_name/records/$record_id", $attributes);
        return $response;
    }

    public function deleteDomainRecord(string $domain_name, int $record_id)
    {
        $this->doCurl("DELETE", "domains/$domain_name/records/$record_id");
        $response = $this->getLastHttpResponse();
        if ($response >= 200 && $response < 300) {
            return true;
        } else {
            throw new Exception("API Error: " . $response );
            return false;
        }
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

    public function deleteDropletById(int $id)
    {
        $this->doCurl("DELETE", "droplets/$id");
        $response = $this->getLastHttpResponse();
        if ($response >= 200 && $response < 300) {
            return true;
        } else {
            throw new Exception("API Error: " . $response );
            return false;
        }
    }

    public function deleteDropletsByTag(string $tag_name)
    {
        $this->doCurl("DELETE", "droplets?tag_name=$tag_name");
        $response = $this->getLastHttpResponse();
        if ($response >= 200 && $response < 300) {
            return true;
        } else {
            throw new Exception("API Error: HTTP code " . $response);
            return false;
        }
    }

    public function getDropletActionsById(int $id)
    {
        $response = $this->doCurl("GET", "droplets/$id/actions");
        return $response;
    }

    public function getDropletBackupsById(int $id)
    {
        $response = $this->doCurl("GET", "droplets/$id/backups");
        return $response;
    }

    public function getDropletById(int $id)
    {
        $response = $this->doCurl("GET", "droplets/$id");
        return $response;
    }

    public function getDropletByTag(string $tag_name)
    {
        $response = $this->doCurl("GET", "droplets?tag_name=$tag_name");
        return $response;
    }

    public function getDropletKernelsById(int $id)
    {
        $response = $this->doCurl("GET", "droplets/$id/kernels");
        return $response;
    }

    public function getDropletNeighbors()
    {
        $response = $this->doCurl("GET", "reports/droplet_neighbors");
        return $response;
    }

    public function getDropletNeighborsById(int $id)
    {
        $response = $this->doCurl("GET", "droplets/$id/neighbors");
        return $response;
    }

    public function getDroplets()        
    {
        $response = $this->doCurl("GET", "droplets");
        return $response;
    }

    public function getDropletsByTag(string $tag_name)
    {
        $response = $this->doCurl("GET", "droplets?tag_name=$tag_name");
        return $response;
    }

    public function getDropletSnapshotsById(int $id)
    {
        $response = $this->doCurl("GET", "droplets/$id/snapshots");
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

    public function enableBackups(int $droplet_id, array $attributes)
    {
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function disableBackups(int $droplet_id, array $attributes)
    {
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function reboot(int $droplet_id, array $attributes)
    {
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function powerCycle(int $droplet_id, array $attributes)
    {
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function shutdown(int $droplet_id, array $attributes)
    {
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function powerOff(int $droplet_id, array $attributes)
    {
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function powerOn(int $droplet_id, array $attributes)
    {
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function restore(int $droplet_id, array $attributes)
    {
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function resetPassword(int $droplet_id, array $attributes)
    {
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function resize(int $droplet_id, array $attributes)
    {
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function rebuild(int $droplet_id, array $attributes)
    {
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function rename(int $droplet_id, array $attributes)
    {
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function changeKernel(int $droplet_id, array $attributes)
    {
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function enableIPv6(int $droplet_id, array $attributes)
    {
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function enablePrivateNetworking(int $droplet_id, array $attributes)
    {
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

    public function createSnapshot(int $droplet_id, array $attributes)
    {
        $response = $this->doCurl("POST", "droplets/$droplet_id/actions", $attributes);
        return $response;
    }

//    public function doActionByTag($tag_name, $attributes)
//    {
//        $response = $this->doCurl("POST", "droplets/actions?tag_name=$tag_name", $attributes);
//        return $response;
//    }

    public function getAction(int $droplet_id, int $action_id)
    {
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

    public function getActions(int $image_id)
    {
        $response = $this->doCurl("GET", "images/$image_id/actions");
        return $response;
    }

    public function getImageById(int $image_id)
    {
        $response = $this->doCurl("GET", "images/$image_id");
        return $response;
    }

    public function getImageBySlug(string $image_slug)
    {
        $response = $this->doCurl("GET", "images/$image_slug");
        return $response;
    }

    public function updateImage(int $image_id, array $attributes)
    {
        $response = $this->doCurl("PUT", "images/$image_id", $attributes);
        return $response;
    }

    public function deleteImage(int $image_id)
    {
        $this->doCurl("DELETE", "images/$image_id");
        $response = $this->getLastHttpResponse();
        if ($response >= 200 && $response < 300) {
            return true;
        } else {
            throw new Exception("API Error: " . $response );
            return false;
        }
    }
}

class ImageActionsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function transferImage(int $image_id, array $attributes)
    {
        $response = $this->doCurl("POST", "images/$image_id/actions", $attributes);
        return $response;
    }

    public function convertImageToSnapshot(int $image_id, array $attributes)
    {
        $response = $this->doCurl("POST", "images/$image_id/actions", $attributes);
        return $response;
    }

    public function getAction(int $image_id, int $action_id)
    {
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

    public function createLoadBalancer()
    {
//        $response = $this->doCurl("POST", "", $attributes);
//        return $response;
    }

    public function getLoadBalancer()
    {
//        $response = $this->doCurl("GET", "");
//        return $response;
    }

    public function getLoadBalancers()
    {
//        $response = $this->doCurl("GET", "");
//        return $response;
    }

    public function updateLoadBalancer()
    {
//        $response = $this->doCurl("PUT", "", $attributes);
//        return $response;
    }

    public function deleteLoadBalancer()
    {
//        $this->doCurl("DELETE", "");
//        $response = $this->getLastHttpResponse();
//        if ($response >= 200 && $response < 300) {
//            return true;
//        } else {
//            throw new Exception("API Error: " . $response );
//            return false;
//        }
    }

    public function addDroplets()
    {
//        $response = $this->doCurl("POST", "", $attributes);
//        return $response;
    }

    public function removeDroplets()
    {
//        $this->doCurl("DELETE", "");
//        $response = $this->getLastHttpResponse();
//        if ($response >= 200 && $response < 300) {
//            return true;
//        } else {
//            throw new Exception("API Error: " . $response );
//            return false;
//        }
    }

    public function addForwardingRules()
    {
//        $response = $this->doCurl("POST", "", $attributes);
//        return $response;
    }

    public function removeForwardingRules()
    {
//        $this->doCurl("DELETE", "");
//        $response = $this->getLastHttpResponse();
//        if ($response >= 200 && $response < 300) {
//            return true;
//        } else {
//            throw new Exception("API Error: " . $response );
//            return false;
//        }
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
//        $response = $this->doCurl("GET", "");
//        return $response;
    }

    public function getSnapshotByDroplet()
    {
//        $response = $this->doCurl("GET", "");
//        return $response;
    }

    public function getSnapshotsByVolume()
    {
//        $response = $this->doCurl("GET", "");
//        return $response;
    }

    public function getSnapshotById()
    {
//        $response = $this->doCurl("GET", "");
//        return $response;
    }

    public function deleteSnapshot()
    {
//        $this->doCurl("DELETE", "");
//        $response = $this->getLastHttpResponse();
//        if ($response >= 200 && $response < 300) {
//            return true;
//        } else {
//            throw new Exception("API Error: " . $response );
//            return false;
//        }
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

    public function getKeyById(int $key_id)
    {
        $response = $this->doCurl("GET", "account/keys/$key_id");
        return $response;
    }

    public function getKeyByFingerprint(string $key_fingerprint)
    {
        $response = $this->doCurl("GET", "account/keys/$key_fingerprint");
        return $response;
    }

    public function updateKeyById(int $key_id, array $attributes)
    {
        $response = $this->doCurl("PUT", "account/keys/$key_id", $attributes);
        return $response;
    }

    public function updateKeyByFingerprint(string $key_fingerprint, array $attributes)
    {
        $response = $this->doCurl("PUT", "account/keys/$key_fingerprint", $attributes);
        return $response;
    }

    public function deleteKeyById(int $key_id)
    {
        $this->doCurl("DELETE", "account/keys/$key_id");
        $response = $this->getLastHttpResponse();
        if ($response >= 200 && $response < 300) {
            return true;
        } else {
            throw new Exception("API Error: " . $response );
            return false;
        }
    }

    public function deleteKeyByFingerprint(string $key_fingerprint)
    {
        $this->doCurl("DELETE", "account/keys/$key_fingerprint");
        $response = $this->getLastHttpResponse();
        if ($response >= 200 && $response < 300) {
            return true;
        } else {
            throw new Exception("API Error: " . $response );
            return false;
        }
    }

    /**
     *  The API docs use the term "destroy" instead of "delete" for SSH keys.
     *  These functions were created as aliases to avoid potential confusion.
     */
    public function destroyKeyById(int $key_id)
    {
        return $this->deleteKeyById($key_id);
    }

    public function destroyKeyByFingerprint(string $key_fingerprint)
    {
        return $this->deleteKeyByFingerprint($key_fingerprint);

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

    public function getFloatingIp(string $ip_address)
    {
        $response = $this->doCurl("GET", "floating_ips/$ip_address");
        return $response;
    }

    public function deleteFloatingIp(string $ip_address)
    {
        $this->doCurl("DELETE", "floating_ips/$ip_address");
        $response = $this->getLastHttpResponse();
        if ($response >= 200 && $response < 300) {
            return true;
        } else {
            throw new Exception("API Error: " . $response );
            return false;
        }
    }
}

class FloatingIpActionsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }

    public function assignFloatingIp(string $ip_address, int $droplet_id)
    {
        $attributes["type"] = "assign";
        $attributes["droplet_id"] = $droplet_id;
        $response = $this->doCurl("POST", "floating_ips/$ip_address/actions", $attributes);
        return $response;
    }

    public function unassignFloatingIp(string $ip_address)
    {
        $attributes["type"] = "unassign";
        $response = $this->doCurl("POST", "floating_ips/$ip_address/actions", $attributes);
        return $response;
    }

    public function getActions(string $ip_address)
    {
        $response = $this->doCurl("GET", "floating_ips/$ip_address/actions");
        return $response;
    }

    public function getActionById(string $ip_address, int $action_id)
    {
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

    public function createTag(string $tag_name)
    {
        $attributes["tag_name"] = $tag_name;
        $response = $this->doCurl("POST", "tags", $attributes);
        return $response;
    }

    public function getTag(string $tag_name)
    {
        $response = $this->doCurl("GET", "tags/$tag_name");
        return $response;
    }

    public function getTags()
    {
        $response = $this->doCurl("GET", "tags");
        return $response;
    }

    public function tagResource(string $tag_name, int $resource_id, string $resource_type)
    {
        $attributes["resource_id"] = $resource_id;
        $attributes["resource_type"] = $resource_type;
        $response = $this->doCurl("POST", "tags/$tag_name/resources", $attributes);
        return $response;
    }

    public function untagResource(string $tag_name, int $resource_id, string $resource_type)
    {
        $attributes["resource_id"] = $resource_id;
        $attributes["resource_type"] = $resource_type;
        $response = $this->doCurl("DELETE", "tags/$tag_name/resources", $attributes);
        return $response;
    }

    public function deleteTag(string $tag_name)
    {
        $response = $this->doCurl("DELETE", "tags/$tag_name");
        return $response;
    }
}
