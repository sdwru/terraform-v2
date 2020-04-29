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

use TerraformV2\Entity\Account as AccountEntity;

/**
 * @author Antoine Corcy <contact@sbin.dk>
 * @author Graham Campbell <graham@alt-three.com>
 */
class Account extends AbstractApi
{
    /**
     * @return AccountEntity
     */
    public function getUserInformation()
    {
        $account = $this->adapter->get(sprintf('%s/account/details', $this->endpoint));

        $account = json_decode($account);

        return new AccountEntity($account->data);
    }
}
