<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\StringSchema;

final class StringSchemaTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new StringSchema('name');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new StringSchema('name'))
            ->setMinLength(2)
            ->setMaxLength(20)
            ->setPattern('/\w+/')
            ->setTitle('Schema title')
            ->setDescription('Some description')
            ->setNullable(false)
            ->setExample('foo');
    }
}
