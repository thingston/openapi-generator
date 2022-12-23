<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\NumericSchema;

final class NumericSchemaTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new NumericSchema('name');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return $schema = (new NumericSchema('name'))
            ->setMinimum(10.0)
            ->setMaximum(100.0)
            ->setExclusiveMinimum(false)
            ->setExclusiveMaximum(false)
            ->setMultipleOf(5.0)
            ->setTitle('Schema title')
            ->setDescription('Some description')
            ->setNullable(false);
    }
}
