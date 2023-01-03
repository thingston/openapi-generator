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
        return new ArraySchema('name');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new ArraySchema('name'))
            ->setItems(new StringSchema('item'))
            ->setAdditionalItems(false)
            ->setMinItems(3)
            ->setMaxItems(7)
            ->setUniqueItems(true)
            ->setTitle('Schema title')
            ->setDescription('Some description')
            ->setNullable(false)
            ->setExample(['foo', 'bar']);
    }
}
