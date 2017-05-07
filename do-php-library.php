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
    public $FloatingIPs;
    public $FloatingIPActions;
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
        $this->FloatingIPs = new FloatingIPsClient($config);
        $this->FloatingIPActions = new FloatingIPActionsClient($config);
        $this->Tags = new TagsClient($config);
    }
}

class EndPointClient
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
}

class BlockStorageActionsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }
}

class CertificatesClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }
}
class DomainsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }
}
class DomainRecordsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
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
        if( !isset($attributes['name']) || !isset($attributes['region']) || !isset($attributes['size']) || !isset($attributes['image']) ) {
            throw new Exception("User Error: missing required attribute for Droplet creation");
            return false;
        }

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
}

class ImagesClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }
}

class ImageActionsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }
}

class LoadBalancersClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }
}

class SnapshotsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }
}

class SSHKeysClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
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

class FloatingIPsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }
}

class FloatingIPActionsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }
}

class TagsClient extends EndpointClient
{
    public function __construct(array $config)
    {
        $this->init($config);
    }
}
