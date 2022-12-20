<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\NullSchema;

final class NullSchemaTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        $schema = new NullSchema('name');

        return $schema;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $schema = new NullSchema('name');
        $schema->title = 'Schema title';
        $schema->description = 'Some description';
        $schema->nullable = false;

        return $schema;
    }
}
