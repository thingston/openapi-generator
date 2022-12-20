<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\IntegerSchema;

final class IntegerSchemaTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        $schema = new IntegerSchema('name');

        return $schema;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $schema = new IntegerSchema('name');
        $schema->title = 'Schema title';
        $schema->description = 'Some description';
        $schema->nullable = false;
        $schema->minimum = 1;
        $schema->maximum = 100;
        $schema->exclusiveMinimum = true;
        $schema->exclusiveMaximum = true;
        $schema->multipleOf = 5;

        return $schema;
    }
}
