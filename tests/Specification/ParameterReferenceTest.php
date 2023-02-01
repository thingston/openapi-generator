<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;
use Thingston\OpenApi\Specification\ParameterReference;
use Thingston\OpenApi\Test\AbstractTestCase;

final class ParameterReferenceTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $reference = new ParameterReference('foo', '#/components/parameters/Foo');

        $this->assertSame('foo', $reference->getKey());
        $this->assertSame('#/components/parameters/Foo', $reference->getRef());
    }

    public function testInvalidParameterReference(): void
    {
        $this->expectException(InvalidArgumentException::class);
        ParameterReference::create('foo', 'invalid reference');
    }
}
