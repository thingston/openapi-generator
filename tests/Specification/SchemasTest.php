<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\IntegerSchema;
use Thingston\OpenApi\Specification\Reference;
use Thingston\OpenApi\Specification\Schemas;
use Thingston\OpenApi\Specification\StringSchema;

final class SchemasTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        $schemas = new Schemas([
            new IntegerSchema('id'),
            new StringSchema('name'),
        ]);

        return $schemas;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $schemas = new Schemas([
            new Reference('foo', '#/components/schemas/Foo'),
            new Reference('bar', '#/components/schemas/Bar'),
        ]);

        return $schemas;
    }
}
