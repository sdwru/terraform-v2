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

use TerraformV2\Entity\OauthToken as OauthTokenEntity;

/**
 * @author Antoine Corcy <contact@sbin.dk>
 * @author Graham Campbell <graham@alt-three.com>
 */
class OauthToken extends AbstractApi
{
    /**
     * @return OauthTokenEntity
     */
    public function getAll($organization, $per_page = 100, $page = 1)
    {
        // Special characters"[" and "]" in page[size] and page[number] need to be presented as URL % encoded so "%5B" and "%5D"
        // Since "%" is also a special character it needs to be escaped with another "%" to prevent interpreting.  So "%%5B" and "%%5D"
        $vars = $this->adapter->get(sprintf('%s/organizations/%s/workspaces?page%%5Bsize%%5D=%d&page%%5Bnumber%%5D=%d', $this->endpoint, $organization, $per_page, $page));

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
     * @return OauthClientEntity
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
     * @return OauthClientEntity
     */
    public function getById($organization, $id)
    {
        $var = $this->adapter->get(sprintf('%s/organizations/%s/workspaces/%d', $this->endpoint, $organization, $id));

        $var = json_decode($var);

        return new WorkspaceEntity($var);
    }
    
}
