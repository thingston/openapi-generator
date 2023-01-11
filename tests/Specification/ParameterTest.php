<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\Parameter;
use Thingston\OpenApi\Test\AbstractTestCase;

final class ParameterTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $parameter = new Parameter('foo', Parameter::IN_QUERY);

        $this->assertSame('foo', $parameter->getName());
        $this->assertSame(Parameter::IN_QUERY, $parameter->getIn());

        $this->assertNull($parameter->getDescription());
        $parameter->setDescription('Some description');
        $this->assertSame('Some description', $parameter->getDescription());

        $this->assertNull($parameter->getRequired());
        $parameter->setRequired(true);
        $this->assertTrue($parameter->getRequired());

        $this->assertNull($parameter->getDeprecated());
        $parameter->setDeprecated(true);
        $this->assertTrue($parameter->getDeprecated());

        $this->assertNull($parameter->getAllowEmptyValue());
        $parameter->setAllowEmptyValue(true);
        $this->assertTrue($parameter->getAllowEmptyValue());
    }

    public function testFullSpecification(): void
    {
        $parameter = new Parameter('foo', Parameter::IN_QUERY, 'Some description', true, true, true);

        $this->assertSame('foo', $parameter->getName());
        $this->assertSame(Parameter::IN_QUERY, $parameter->getIn());
        $this->assertSame('Some description', $parameter->getDescription());
        $this->assertTrue($parameter->getRequired());
        $this->assertTrue($parameter->getDeprecated());
        $this->assertTrue($parameter->getAllowEmptyValue());
    }

    public function testFactory(): void
    {
        $parameter = Parameter::create('foo', Parameter::IN_QUERY);

        $this->assertSame('foo', $parameter->getName());
        $this->assertSame(Parameter::IN_QUERY, $parameter->getIn());
    }
}
