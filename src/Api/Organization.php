<?php

/*
 * This file is part of the TerraformV2 library.
 *
 * (c) Antoine Corcy <contact@sbin.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TerraformV2\Api;

use TerraformV2\Entity\Organization as OrganizationEntity;

/**
 * @author Antoine Corcy <contact@sbin.dk>
 * @author Graham Campbell <graham@alt-three.com>
 */
class Organization extends AbstractApi
{
    /**
     * @return AccountEntity
     */
    public function getAll($per_page = 200, $page = 1)
    {
        $vars = $this->adapter->get(sprintf('%s/organizations?page[size]=%d&page[number]=%d', $this->endpoint, $per_page, $page));

        $vars = json_decode($vars);
        
        return array_map(function ($var) {
            return new OrganizationEntity($var);
        }, $vars->data);
    }
    
    /**
     * @param int $id
     *
     * @throws HttpException
     *
     * @return CredentialEntity
     */
    public function getByName($name)
    {
        $var = $this->adapter->get(sprintf('%s/organizations/%s', $this->endpoint, $name));

        $var = json_decode($var);

        return new OrganizationEntity($var);
    }
    
    
}
