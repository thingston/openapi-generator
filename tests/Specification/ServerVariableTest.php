<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\Enum;
use Thingston\OpenApi\Specification\ServerVariable;
use Thingston\OpenApi\Test\AbstractTestCase;

final class ServerVariableTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $variable = new ServerVariable('foo');

        $this->assertSame('foo', $variable->getDefault());

        $this->assertNull($variable->getDescription());
        $variable->setDescription('Some description');
        $this->assertSame('Some description', $variable->getDescription());

        $this->assertNull($variable->getEnum());
        $variable->setEnum($enum = new Enum(['foo', 'bar']));
        $this->assertSame($enum, $variable->getEnum());
    }

    public function testFullSpecification(): void
    {
        $variable = new ServerVariable('foo', 'Some description', $enum = new Enum(['foo', 'bar']));

        $this->assertSame('foo', $variable->getDefault());
        $this->assertSame('Some description', $variable->getDescription());
        $this->assertSame($enum, $variable->getEnum());
    }

    public function testFactory(): void
    {
        $variable = ServerVariable::create('foo', ['foo', 'bar']);

        $this->assertSame('foo', $variable->getDefault());
    }
}
