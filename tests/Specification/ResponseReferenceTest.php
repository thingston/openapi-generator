<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;
use Thingston\OpenApi\Specification\ResponseReference;
use Thingston\OpenApi\Test\AbstractTestCase;

final class ResponseReferenceTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $reference = new ResponseReference('foo', '#/components/responses/Foo');

        $this->assertSame('foo', $reference->getKey());
        $this->assertSame('#/components/responses/Foo', $reference->getRef());
    }

    public function testInvalidResponseReference(): void
    {
        $this->expectException(InvalidArgumentException::class);
        ResponseReference::create('foo', 'invalid reference');
    }
}
