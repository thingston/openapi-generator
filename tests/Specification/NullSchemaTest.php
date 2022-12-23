<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\NullSchema;

final class NullSchemaTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new NullSchema('name');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return $schema = (new NullSchema('name'))
            ->setTitle('Schema title')
            ->setDescription('Some description')
            ->setNullable(false);
    }
}
