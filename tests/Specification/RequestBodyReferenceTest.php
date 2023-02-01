<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;
use Thingston\OpenApi\Specification\RequestBodyReference;
use Thingston\OpenApi\Test\AbstractTestCase;

final class RequestBodyReferenceTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $reference = new RequestBodyReference('foo', '#/components/requestBodies/Foo');

        $this->assertSame('foo', $reference->getKey());
        $this->assertSame('#/components/requestBodies/Foo', $reference->getRef());
    }

    public function testInvalidRequestBodyReference(): void
    {
        $this->expectException(InvalidArgumentException::class);
        RequestBodyReference::create('foo', 'invalid reference');
    }
}
