<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Reference;

final class ReferenceTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        $reference = new Reference('name', '#/components/schemas/Foo');

        return $reference;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return $this->createMinimalSpecification();
    }
}
