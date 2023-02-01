<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;
use Thingston\OpenApi\Specification\HeaderReference;
use Thingston\OpenApi\Test\AbstractTestCase;

final class HeaderReferenceTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $reference = new HeaderReference('foo', '#/components/headers/Foo');

        $this->assertSame('foo', $reference->getKey());
        $this->assertSame('#/components/headers/Foo', $reference->getRef());
    }

    public function testInvalidHeaderReference(): void
    {
        $this->expectException(InvalidArgumentException::class);
        HeaderReference::create('foo', 'invalid reference');
    }
}
