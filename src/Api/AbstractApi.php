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

use TerraformV2\Adapter\AdapterInterface;
use TerraformV2\Entity\Meta;

/**
 * @author Antoine Corcy <contact@sbin.dk>
 * @author Graham Campbell <graham@alt-three.com>
 */
abstract class AbstractApi
{
    /**
     * @var string
     */
    const ENDPOINT = 'https://api.terraform.com/v2';

    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var Meta
     */
    protected $meta;

    /**
     * @param AdapterInterface $adapter
     * @param string|null      $endpoint
     */
    public function __construct(AdapterInterface $adapter, $baseEndpoint)
    {
        $this->adapter = $adapter;
        $this->endpoint = $baseEndpoint . '/v2';
    }

    /**
     * @param \stdClass $data
     *
     * @return Meta|null
     */
    protected function extractMeta(\StdClass $data)
    {
        if (isset($data->meta)) {
            $this->meta = new Meta($data->meta);
        }

        return $this->meta;
    }

    /**
     * @return Meta|null
     */
    public function getMeta()
    {
        return $this->meta;
    }
    
    public function removeEmptyArrayElements($array)
    {
        foreach($array as $k=>&$v){
                if(is_array($v)){
                    $v = $this->removeEmptyArrayElements($v);  // filter subarray and update array
                    if(!sizeof($v)){ // check array count
                        unset($array[$k]);
                    }
                }elseif(!strlen($v) && !is_bool($v)){  // this will handle (int) type values correctly
                    unset($array[$k]);
                }
        }
        return $array;
    }
}
