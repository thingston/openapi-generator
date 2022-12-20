<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Components;
use Thingston\OpenApi\Specification\Schemas;

final class ComponentsTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        $components = new Components();

        return $components;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $components = new Components();
        $components->schemas = new Schemas();

        return $components;
    }
}
