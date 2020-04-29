<?php

/*
 * This file is part of the TerraFormV2 library.
 *
 * (c) Antoine Corcy <contact@sbin.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TerraFormV2\Entity;

/**
 * @author Jacob Holmes <jwh315@cox.net>
 */
class StickySession extends AbstractEntity
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $cookieName;

    /**
     * @var string
     */
    public $cookieTtlSeconds;
}
