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
    public function getAll($oauthClient)
    {
        // Special characters"[" and "]" in page[size] and page[number] need to be presented as URL % encoded so "%5B" and "%5D"
        // Since "%" is also a special character it needs to be escaped with another "%" to prevent interpreting.  So "%%5B" and "%%5D"
        $vars = $this->adapter->get(sprintf('%s/oauth-clients/%s/oauth-tokens', $this->endpoint, $oauthClient));

        $vars = json_decode($vars);

        return array_map(function ($var) {
            return new OauthTokenEntity($var);
        }, $vars->data);
    }
    
    /**
     * @param int $id
     *
     * @throws HttpException
     *
     * @return OauthTokenEntity
     */
    public function getById($id)
    {
        $var = $this->adapter->get(sprintf('%s/oauth-tokens/%s', $this->endpoint, $id));

        $var = json_decode($var);

        return new OauthTokenEntity($var);
    }
    
}
