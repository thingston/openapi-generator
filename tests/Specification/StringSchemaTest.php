<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\StringSchema;

final class StringSchemaTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        $schema = new StringSchema('name');

        return $schema;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $schema = new StringSchema('name');
        $schema->title = 'Schema title';
        $schema->description = 'Some description';
        $schema->nullable = false;
        $schema->minLength = 1;
        $schema->maxLength = 10;
        $schema->pattern = '/.*/';

        return $schema;
    }
}
