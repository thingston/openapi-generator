<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\Reference;
use Thingston\OpenApi\Test\AbstractTestCase;

final class ReferenceTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $reference = new Reference('foo', '#/components/schemas/Foo');

        $this->assertSame('foo', $reference->getKey());
        $this->assertSame('#/components/schemas/Foo', $reference->getRef());
    }
}
