<?php

namespace spec\TerraformV2;

class TerraformV2Spec extends \PhpSpec\ObjectBehavior
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
        $this->shouldHaveType('TerraformV2\TerraformV2');
    }

    function it_should_return_an_account_instance()
    {
        $this->account()->shouldBeAnInstanceOf('TerraformV2\Api\Account');
    }

    function it_should_return_an_action_instance()
    {
        $this->action()->shouldBeAnInstanceOf('TerraformV2\Api\Action');
    }

    function it_should_return_a_certificate_instance()
    {
        $this->certificate()->shouldBeAnInstanceOf('TerraformV2\Api\Certificate');
    }

    function it_should_return_a_domain_instance()
    {
        $this->domain()->shouldBeAnInstanceOf('TerraformV2\Api\Domain');
    }

    function it_should_return_a_domain_records_instance()
    {
        $this->domainRecord()->shouldBeAnInstanceOf('TerraformV2\Api\DomainRecord');
    }

    function it_should_return_a_droplet_instance()
    {
        $this->droplet()->shouldBeAnInstanceOf('TerraformV2\Api\Droplet');
    }

    function it_should_return_a_floating_ip_instance()
    {
        $this->floatingIp()->shouldBeAnInstanceOf('TerraformV2\Api\FloatingIp');
    }

    function it_should_return_an_image_instance()
    {
        $this->image()->shouldBeAnInstanceOf('TerraformV2\Api\Image');
    }

    function it_should_return_a_key_instance()
    {
        $this->key()->shouldBeAnInstanceOf('TerraformV2\Api\Key');
    }

    function it_should_return_a_load_balancer_instance()
    {
        $this->loadBalancer()->shouldBeAnInstanceOf('TerraformV2\Api\LoadBalancer');
    }

    function it_should_return_a_rate_limit_instance()
    {
        $this->rateLimit()->shouldBeAnInstanceOf('TerraformV2\Api\RateLimit');
    }

    function it_should_return_a_region_instance()
    {
        $this->region()->shouldBeAnInstanceOf('TerraformV2\Api\Region');
    }

    function it_should_return_a_size_instance()
    {
        $this->size()->shouldBeAnInstanceOf('TerraformV2\Api\Size');
    }

    function it_should_return_a_volume_instance()
    {
        $this->volume()->shouldBeAnInstanceOf('TerraformV2\Api\Volume');
    }
}
