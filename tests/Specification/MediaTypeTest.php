<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Examples;
use Thingston\OpenApi\Specification\MediaType;
use Thingston\OpenApi\Specification\StringSchema;

final class MediaTypeTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new MediaType();
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new MediaType())
            ->setSchema(new StringSchema('application/json'))
            ->setExample(['foo' => 'bar'])
            ->setExamples(new Examples());
    }
}
