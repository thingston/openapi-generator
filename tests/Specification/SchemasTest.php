<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;
use Thingston\OpenApi\Specification\IntegerSchema;
use Thingston\OpenApi\Specification\Schemas;
use Thingston\OpenApi\Specification\StringSchema;
use Thingston\OpenApi\Test\AbstractTestCase;

final class SchemasTest extends AbstractTestCase
{
    public function testSpecification(): void
    {
        $schemas = new Schemas([
            new IntegerSchema('id'),
            new StringSchema('name'),
        ]);

        $this->assertCount(2, $schemas);
    }

    public function testInvalidItem(): void
    {
        $schemas = new Schemas();

        $this->expectException(InvalidArgumentException::class);
        /** @phpstan-ignore-next-line */
        $schemas->addSchema('invalid type');
    }
}
