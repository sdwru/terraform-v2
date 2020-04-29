<?php

namespace spec\TerraFormV2;

class TerraFormV2Spec extends \PhpSpec\ObjectBehavior
{
    /**
     * @param \TerraFormV2\Adapter\AdapterInterface $adapter
     */
    function let($adapter)
    {
        $this->beConstructedWith($adapter);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('TerraFormV2\TerraFormV2');
    }

    function it_should_return_an_account_instance()
    {
        $this->account()->shouldBeAnInstanceOf('TerraFormV2\Api\Account');
    }

    function it_should_return_an_action_instance()
    {
        $this->action()->shouldBeAnInstanceOf('TerraFormV2\Api\Action');
    }

    function it_should_return_a_certificate_instance()
    {
        $this->certificate()->shouldBeAnInstanceOf('TerraFormV2\Api\Certificate');
    }

    function it_should_return_a_domain_instance()
    {
        $this->domain()->shouldBeAnInstanceOf('TerraFormV2\Api\Domain');
    }

    function it_should_return_a_domain_records_instance()
    {
        $this->domainRecord()->shouldBeAnInstanceOf('TerraFormV2\Api\DomainRecord');
    }

    function it_should_return_a_droplet_instance()
    {
        $this->droplet()->shouldBeAnInstanceOf('TerraFormV2\Api\Droplet');
    }

    function it_should_return_a_floating_ip_instance()
    {
        $this->floatingIp()->shouldBeAnInstanceOf('TerraFormV2\Api\FloatingIp');
    }

    function it_should_return_an_image_instance()
    {
        $this->image()->shouldBeAnInstanceOf('TerraFormV2\Api\Image');
    }

    function it_should_return_a_key_instance()
    {
        $this->key()->shouldBeAnInstanceOf('TerraFormV2\Api\Key');
    }

    function it_should_return_a_load_balancer_instance()
    {
        $this->loadBalancer()->shouldBeAnInstanceOf('TerraFormV2\Api\LoadBalancer');
    }

    function it_should_return_a_rate_limit_instance()
    {
        $this->rateLimit()->shouldBeAnInstanceOf('TerraFormV2\Api\RateLimit');
    }

    function it_should_return_a_region_instance()
    {
        $this->region()->shouldBeAnInstanceOf('TerraFormV2\Api\Region');
    }

    function it_should_return_a_size_instance()
    {
        $this->size()->shouldBeAnInstanceOf('TerraFormV2\Api\Size');
    }

    function it_should_return_a_volume_instance()
    {
        $this->volume()->shouldBeAnInstanceOf('TerraFormV2\Api\Volume');
    }
}
