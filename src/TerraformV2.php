<?php

/*
 * This file is part of the TerraformV2 library.
 *
 * (c) Antoine Corcy <contact@sbin.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TerraformV2;

use TerraformV2\Adapter\AdapterInterface;
use TerraformV2\Api\Account;
use TerraformV2\Api\Action;
use TerraformV2\Api\Certificate;
use TerraformV2\Api\Domain;
use TerraformV2\Api\DomainRecord;
use TerraformV2\Api\Droplet;
use TerraformV2\Api\FloatingIp;
use TerraformV2\Api\Image;
use TerraformV2\Api\Key;
use TerraformV2\Api\LoadBalancer;
use TerraformV2\Api\RateLimit;
use TerraformV2\Api\Region;
use TerraformV2\Api\Size;
use TerraformV2\Api\Snapshot;
use TerraformV2\Api\Volume;

/**
 * @author Antoine Corcy <contact@sbin.dk>
 * @author Graham Campbell <graham@alt-three.com>
 */
class TerraformV2
{
    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * @string $url
     */
    protected $url;

    /**
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter, $baseApiUrl)
    {
        $this->adapter = $adapter;
        $this->url = $baseApiUrl;
    }

    /**
     * @return Account
     */
    public function account()
    {
        return new Account($this->adapter, $this->url);
    }

    /**
     * @return Action
     */
    public function action()
    {
        return new Action($this->adapter, $this->url);
    }

    /**
     * @return Certificate
     */
    public function certificate()
    {
        return new Certificate($this->adapter, $this->url);
    }

    /**
     * @return Domain
     */
    public function domain()
    {
        return new Domain($this->adapter, $this->url);
    }

    /**
     * @return DomainRecord
     */
    public function domainRecord()
    {
        return new DomainRecord($this->adapter, $this->url);
    }

    /**
     * @return Droplet
     */
    public function droplet()
    {
        return new Droplet($this->adapter, $this->url);
    }

    /**
     * @return FloatingIp
     */
    public function floatingIp()
    {
        return new FloatingIp($this->adapter, $this->url);
    }

    /**
     * @return Image
     */
    public function image()
    {
        return new Image($this->adapter, $this->url);
    }

    /**
     * @return Key
     */
    public function key()
    {
        return new Key($this->adapter, $this->url);
    }

    /**
     * @return LoadBalancer
     */
    public function loadBalancer()
    {
        return new LoadBalancer($this->adapter, $this->url);
    }

    /**
     * @return RateLimit
     */
    public function rateLimit()
    {
        return new RateLimit($this->adapter, $this->url);
    }

    /**
     * @return Region
     */
    public function region()
    {
        return new Region($this->adapter, $this->url);
    }

    /**
     * @return Size
     */
    public function size()
    {
        return new Size($this->adapter, $this->url);
    }

    /**
     * @return Volume
     */
    public function volume()
    {
        return new Volume($this->adapter, $this->url);
    }

    /**
     * @return Snapshot
     */
    public function snapshot()
    {
        return new Snapshot($this->adapter, $this->url);
    }
}
