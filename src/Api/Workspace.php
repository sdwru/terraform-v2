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
    
    /**
     * @param string $name
     * @param string $ipAddress
     *
     * @throws HttpException
     *
     * @return WorkspaceEntity
     */
    public function create($organization, $attr=[])
    {
        // Refer to https://www.terraform.io/docs/cloud/api/workspaces.html
        // For attributes $attr[].

        //If no name given generate a random one.
        if (!isset($attr['name'])) {
            $name = uniqid();
        }

        $array = array(
            'data' => array(
                'type' => 'workspaces',
                'attributes' => array(
                    'name' => $name,
                    'allow-destroy-plan' => $attr['allow-destroy-plan'] ?? true,
                    'auto-apply' => $attr['auto-apply'] ?? false,
                    'description' => $attr['description'] ?? '',
                    'operations' => $attr['operations'] ?? true,
                    'file-triggers-enabled' => $attr['file-triggers-enabled'] ?? true,
                    'source-name' => $attr['source-name'] ?? '',
                    'source-url' => $attr['source-url'] ?? '',
                    'queue-all-runs' => $attr['queue-all-runs'] ?? false,
                    'speculative-enabled' => $attr['speculative-enabled'] ?? true,
                    'terraform-version' => $attr['terraform-version'] ?? '',
                    'trigger-prefixes' => $attr['trigger-prefixes'] ?? [],
                    'vcs-repo' => $attr['vcs-repo'] ?? '',
                )
            )
        );

        $array = $this->removeEmptyArrayElements($array);

        $var = $this->adapter->post(sprintf('%s/organizations/%s/workspaces', $this->endpoint, $organization), $array);
        
        $var = json_decode($var);
        
        return new WorkspaceEntity($var->data);
    }
    
    /**
     * @param int $id
     *
     * @throws HttpException
     */
    public function delete($id)
    {
        $this->adapter->delete(sprintf('%s/workspaces/%d', $this->endpoint, $id));
    }
    
    /**
     * @param string $organizatoin
     * @param string $name
     *
     * @throws HttpException
     */
    public function deleteByName($organization, $name)
    {
        $this->adapter->delete(sprintf('%s/organizations/%s/workspaces/%s', $this->endpoint, $organization, $name));
    }
}
