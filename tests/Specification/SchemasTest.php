<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\IntegerSchema;
use Thingston\OpenApi\Specification\Schemas;
use Thingston\OpenApi\Specification\StringSchema;

final class SchemasTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new Schemas();
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return new Schemas([
            new IntegerSchema('id'),
            new StringSchema('name'),
        ]);
    }
}
