<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\ObjectSchema;
use Thingston\OpenApi\Specification\Schemas;

final class ObjectSchemaTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        $schema = new ObjectSchema('name');

        return $schema;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $schema = new ObjectSchema('name');
        $schema->title = 'Schema title';
        $schema->description = 'Some description';
        $schema->nullable = false;
        $schema->required = ['foo', 'bar'];
        $schema->properties = new Schemas();
        $schema->additionalProperties = false;
        $schema->minProperties = 3;
        $schema->maxProperties = 5;

        return $schema;
    }
}
