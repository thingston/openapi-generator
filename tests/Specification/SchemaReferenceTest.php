<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;
use Thingston\OpenApi\Specification\SchemaReference;
use Thingston\OpenApi\Test\AbstractTestCase;

final class SchemaReferenceTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $reference = new SchemaReference('foo', '#/components/schemas/Foo');

        $this->assertSame('foo', $reference->getKey());
        $this->assertSame('#/components/schemas/Foo', $reference->getRef());
    }

    public function testInvalidSchemaReference(): void
    {
        $this->expectException(InvalidArgumentException::class);
        SchemaReference::create('foo', 'invalid reference');
    }
}
