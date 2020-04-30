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

use TerraformV2\Entity\Workspace as WorkspaceEntity;

/**
 * @author Antoine Corcy <contact@sbin.dk>
 * @author Graham Campbell <graham@alt-three.com>
 */
class Workspace extends AbstractApi
{
    /**
     * @return WorkspaceEntity
     */
    public function getAll($organization, $per_page = 200, $page = 1)
    {
        $vars = $this->adapter->get(sprintf('%s/organizations/%s/workspaces?page[size]=%d&page[number]=%d', $this->endpoint, $organization, $per_page, $page));

        $vars = json_decode($vars);

        return array_map(function ($var) {
            return new WorkspaceEntity($var);
        }, $vars->data);
    }
    
    /**
     * @param string $name
     *
     * @throws HttpException
     *
     * @return WorkspaceEntity
     */
    public function getByName($organization, $name)
    {
        $var = $this->adapter->get(sprintf('%s/organizations/%s/workspaces/%s', $this->endpoint, $organization, $name));

        $var = json_decode($var);

        return new WorkspaceEntity($var);
    }
    
    /**
     * @param int $id
     *
     * @throws HttpException
     *
     * @return WorkspaceEntity
     */
    public function getById($organization, $id)
    {
        $var = $this->adapter->get(sprintf('%s/organizations/%s/workspaces/%d', $this->endpoint, $organization, $id));

        $var = json_decode($var);

        return new WorkspaceEntity($var);
    }
    
}
