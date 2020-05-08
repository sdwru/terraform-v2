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

use TerraformV2\Entity\WorkspaceVariable as WorkspaceVariableEntity;

/**
 * @author Antoine Corcy <contact@sbin.dk>
 * @author Graham Campbell <graham@alt-three.com>
 */
class WorkspaceVariable extends AbstractApi
{
    /**
     * @return WorkspaceVariableEntity
     */
    public function getAll($id, $per_page = 100, $page = 1)
    {
        // Special characters"[" and "]" in page[size] and page[number] need to be presented as URL % encoded so "%5B" and "%5D"
        // Since "%" is also a special character it needs to be escaped with another "%" to prevent interpreting.  So "%%5B" and "%%5D"
        $vars = $this->adapter->get(sprintf('%s/workspaces/%d/vars?page%%5Bsize%%5D=%d&page%%5Bnumber%%5D=%d', $this->endpoint, $id, $per_page, $page));

        $vars = json_decode($vars);

        return array_map(function ($var) {
            return new WorkspaceVariableEntity($var);
        }, $vars->data);
    }
    
    /**
     * @param string $name
     * @param string $ipAddress
     *
     * @throws HttpException
     *
     * @return WorkspaceVariableEntity
     */
    public function create($id, $attributes=[])
    {
        // Refer to https://www.terraform.io/docs/cloud/api/workspaces.html
        // For $attributes[].

        //If no name given generate a random one.
        if (!isset($attributes['name'])) {
            $name = uniqid();
        }

        $array = array(
            'data' => array(
                'type' => 'workspaces',
                'attributes' => array(
                    'name' => $name,
                    'allow-destroy-plan' => $attributes['allow-destroy-plan'] ?? true,
                    'auto-apply' => $attributes['auto-apply'] ?? false,
                    'description' => $attributes['description'] ?? '',
                    'operations' => $attributes['operations'] ?? true,
                    'file-triggers-enabled' => $attributes['file-triggers-enabled'] ?? true,
                    'source-name' => $attributes['source-name'] ?? '',
                    'source-url' => $attributes['source-url'] ?? '',
                    'queue-all-runs' => $attributes['queue-all-runs'] ?? false,
                    'speculative-enabled' => $attributes['speculative-enabled'] ?? true,
                    'terraform-version' => $attributes['terraform-version'] ?? '',
                    'trigger-prefixes' => $attributes['trigger-prefixes'] ?? [],
                    'vcs-repo' => $attributes['vcs-repo'] ?? '',
                )
            )
        );

        $array = $this->removeEmptyArrayElements($array);

        $var = $this->adapter->post(sprintf('%s/workspaces/%d/vars', $this->endpoint, $organization), $array);
        
        $var = json_decode($var);
        
        return new WorkspaceVariableEntity($var->data);
    }
    
}
