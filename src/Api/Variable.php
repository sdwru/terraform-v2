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

use TerraformV2\Entity\Variable as VariableEntity;

/**
 * @author Antoine Corcy <contact@sbin.dk>
 * @author Graham Campbell <graham@alt-three.com>
 */
class Variable extends AbstractApi
{
    /**
     * @return VariableEntity
     */
    public function getAll()
    {
        $vars = $this->adapter->get(sprintf('%s/vars', $this->endpoint));

        $vars = json_decode($vars);

        return array_map(function ($var) {
            return new VariableEntity($var);
        }, $vars->data);
    }

    /**
     * @return VariableEntity
     */
    public function getByName($organization, $workspace)
    {
        // Special characters"[" and "]" in filter[organization][name] and filter[workspace][name] need to be presented as URL % encoded so "%5B" and "%5D"
        // Since "%" is also a special character it needs to be escaped with another "%" to prevent interpreting.  So "%%5B" and "%%5D"
        $var = $this->adapter->get(sprintf('%s/vars?filter%%5Borganization%%5D%%5Bname%%5D=%s&filter%%5Bworkspace%%5D%%5Bname%%5D=%s', $this->endpoint, $organization, $workspace));

        $var = json_decode($var);
        return new VariableEntity($var->data);
    }
    
}
