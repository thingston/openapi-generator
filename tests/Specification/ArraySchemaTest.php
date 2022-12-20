<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\ArraySchema;
use Thingston\OpenApi\Specification\StringSchema;

final class ArraySchemaTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        $schema = new ArraySchema('name');

        return $schema;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $schema = new ArraySchema('name');
        $schema->title = 'Schema title';
        $schema->description = 'Some description';
        $schema->nullable = false;
        $schema->items = new StringSchema('item');
        $schema->additionalItems = false;
        $schema->minItems = 1;
        $schema->maxItems = 1;
        $schema->uniqueItems = true;

        return $schema;
    }
}
