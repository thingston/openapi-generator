<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Examples;
use Thingston\OpenApi\Specification\MediaType;
use Thingston\OpenApi\Specification\Reference;

final class MediaTypeTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        $mediaType = new MediaType();

        return $mediaType;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $mediaType = new MediaType();
        $mediaType->schema = new Reference('name', '#/components/schemas/Foo');
        $mediaType->example = ['foo' => 'bar'];
        $mediaType->examples = new Examples();

        return $mediaType;
    }
}
