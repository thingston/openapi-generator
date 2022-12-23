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
        return new ObjectSchema('name');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new ObjectSchema('name'))
            ->setRequired(['foo'])
            ->setProperties(new Schemas())
            ->setMinProperties(1)
            ->setMaxProperties(3)
            ->setAdditionalProperties(false)
            ->setTitle('Schema title')
            ->setDescription('Some description')
            ->setNullable(false);
    }
}
