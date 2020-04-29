<?php

namespace spec\TerraformV2\Api;

class RegionSpec extends \PhpSpec\ObjectBehavior
{
    /**
     * @param \TerraformV2\Adapter\AdapterInterface $adapter
     */
    function let($adapter)
    {
        $this->beConstructedWith($adapter);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('TerraformV2\Api\Region');
    }

    /**
     * @param \TerraformV2\Adapter\AdapterInterface $adapter
     */
    function it_returns_an_array_of_region_entity($adapter)
    {
        $adapter->get('https://api.terraform.com/v2/regions?per_page=200')->willReturn('{"regions": [{},{},{}]}');

        $regions = $this->getAll();
        $regions->shouldBeArray();
        $regions->shouldHaveCount(3);

        foreach ($regions as $region) {
            /**
             * @var \TerraformV2\Entity\Region|\PhpSpec\Wrapper\Subject $region
             */
            $region->shouldReturnAnInstanceOf('TerraformV2\Entity\Region');
        }
    }
}
