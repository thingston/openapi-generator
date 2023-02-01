<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;
use Thingston\OpenApi\Specification\ExampleReference;
use Thingston\OpenApi\Test\AbstractTestCase;

final class ExampleReferenceTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $reference = new ExampleReference('foo', '#/components/examples/Foo');

        $this->assertSame('foo', $reference->getKey());
        $this->assertSame('#/components/examples/Foo', $reference->getRef());
    }

    public function testInvalidExampleReference(): void
    {
        $this->expectException(InvalidArgumentException::class);
        ExampleReference::create('foo', 'invalid reference');
    }
}
