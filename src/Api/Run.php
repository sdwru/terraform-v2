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

use TerraformV2\Entity\Run as RunEntity;

/**
 * @author Antoine Corcy <contact@sbin.dk>
 * @author Graham Campbell <graham@alt-three.com>
 */
class Run extends AbstractApi
{
    /**
     * @return RunEntity
     */
    public function getAll($workspace, $per_page = 100, $page = 1)
    {
        // Special characters"[" and "]" in page[size] and page[number] need to be presented as URL % encoded so "%5B" and "%5D"
        // Since "%" is also a special character it needs to be escaped with another "%" to prevent interpreting.  So "%%5B" and "%%5D"
        $vars = $this->adapter->get(sprintf('%s/workspaces/%s/runs?page%%5Bsize%%5D=%d&page%%5Bnumber%%5D=%d', $this->endpoint, $workspace, $per_page, $page));

        $vars = json_decode($vars);

        return array_map(function ($var) {
            return new RunEntity($var);
        }, $vars->data);
    }
    
    /**
     * @param int $id
     *
     * @throws HttpException
     *
     * @return WorkspaceEntity
     */
    public function getById($id)
    {
        $var = $this->adapter->get(sprintf('%s/runs/%d', $this->endpoint, $id));

        $var = json_decode($var);

        return new RunEntity($var);
    }
    
    /**
     * @param string $name
     * @param string $ipAddress
     *
     * @throws HttpException
     *
     * @return DomainEntity
     */
    public function create($id, $destroy = false, $message='', $configVersion = '' )
    {
        $content = array(
            'data' => array(
                'attributes' => array(
                    'is-destroy' => $destroy,
                    'message' => $message
                ),
                'relationships' => array(
                    'workspace' => array(
                        'data' => array(
                            'type' => 'workspaces',
                            'id' => $id,
                        ),
                    ),
                    'configuration-version' => array(
                        'data' => array(
                            'type' => 'configuration-versions',
                            'id' => $configVersion
                        )
                    )
                ),
            ),      
        );

        if ($content['data']['attributes']['message'] === '' ) {
            unset($content['data']['attributes']['message']);
        }

        if ($content['data']['relationships']['configuration-version']['data']['id'] === '') {
            unset($content['data']['relationships']['configuration-version']['data']['id']);
        }

        $var = $this->adapter->post(sprintf('%s/runs', $this->endpoint), $content);
        
        $var = json_decode($var);
        
        return new RunEntity($var->data);
    }
    /**
     * Undocumented function
     *
     * @param [type] $array
     * @param [type] $key
     * @param [type] $value
     * @return void
     */
    private function recursiveRemove(&$array, $val)
    {
        
    }
}
