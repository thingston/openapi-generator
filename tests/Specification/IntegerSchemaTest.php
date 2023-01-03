<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\IntegerSchema;

final class IntegerSchemaTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new IntegerSchema('name');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new IntegerSchema('name'))
            ->setMinimum(10)
            ->setMaximum(100)
            ->setExclusiveMinimum(false)
            ->setExclusiveMaximum(false)
            ->setMultipleOf(5.0)
            ->setTitle('Schema title')
            ->setDescription('Some description')
            ->setNullable(false)
            ->setExample(123);
    }
}
