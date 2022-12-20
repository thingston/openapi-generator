<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\NumberSchema;

final class NumberSchemaTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        $schema = new NumberSchema('name');

        return $schema;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $schema = new NumberSchema('name');
        $schema->title = 'Schema title';
        $schema->description = 'Some description';
        $schema->nullable = false;
        $schema->minimum = 1.0;
        $schema->maximum = 100.0;
        $schema->exclusiveMinimum = true;
        $schema->exclusiveMaximum = true;
        $schema->multipleOf = 5;

        return $schema;
    }
}
