<?php

/*
 * This file is part of the TerraformV2 library.
 *
 * (c) Sdwru https://github.com/sdwru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TerraformV2\Entity;

/**
 *
 *
 */
final class WorkspaceVariable extends AbstractEntity
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var object
     */
    public $attributes;
}
