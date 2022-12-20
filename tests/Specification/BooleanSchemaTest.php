<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\BooleanSchema;

final class BooleanSchemaTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        $schema = new BooleanSchema('name');

        return $schema;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $schema = new BooleanSchema('name');
        $schema->title = 'Schema title';
        $schema->description = 'Some description';
        $schema->nullable = false;

        return $schema;
    }
}
