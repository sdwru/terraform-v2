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
 * @author Antoine Corcy <contact@sbin.dk>
 * @author Graham Campbell <graham@alt-three.com>
 */
final class Account extends AbstractEntity
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var type
     */
    public $type;

    /**
     * @var object
     */
    public $attributes;

    /**
     * @var object
     */
    public $relationships;

    /**
     * @var object
     */
    public $links;
}
