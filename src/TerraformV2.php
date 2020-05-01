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
use TerraformV2\Api\Organization;
use TerraformV2\Api\Workspace;
use TerraformV2\Api\Variable;

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
     * @return Organization
     */
    public function organization()
    {
        return new Organization($this->adapter, $this->url);
    }

    /**
     * @return Workspace
     */
    public function workspace()
    {
        return new Workspace($this->adapter, $this->url);
    }

    /**
     * @return Variable
     */
    public function variable()
    {
        return new Variable($this->adapter, $this->url);
    }
}
