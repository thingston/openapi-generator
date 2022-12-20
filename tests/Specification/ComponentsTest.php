<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Components;
use Thingston\OpenApi\Specification\Examples;
use Thingston\OpenApi\Specification\Headers;
use Thingston\OpenApi\Specification\Parameters;
use Thingston\OpenApi\Specification\RequestBodies;
use Thingston\OpenApi\Specification\Responses;
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
        $components->responses = new Responses();
        $components->parameters = new Parameters();
        $components->examples = new Examples();
        $components->requestBodies = new RequestBodies();
        $components->headers = new Headers();

        return $components;
    }
}
