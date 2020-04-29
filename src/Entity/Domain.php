<?php

/*
 * This file is part of the TerraformV2 library.
 *
 * (c) Antoine Corcy <contact@sbin.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TerraformV2\Entity;

/**
 * @author Yassir Hannoun <yassir.hannoun@gmail.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
final class Domain extends AbstractEntity
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $ttl;

    /**
     * @var string
     */
    public $zoneFile;
}
