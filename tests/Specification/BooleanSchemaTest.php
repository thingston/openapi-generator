<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\BooleanSchema;

final class BooleanSchemaTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new BooleanSchema('name');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return $schema = (new BooleanSchema('name'))
            ->setTitle('Schema title')
            ->setDescription('Some description')
            ->setNullable(false);
    }
}
