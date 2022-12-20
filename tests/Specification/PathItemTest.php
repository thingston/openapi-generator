<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Operation;
use Thingston\OpenApi\Specification\Parameters;
use Thingston\OpenApi\Specification\PathItem;
use Thingston\OpenApi\Specification\Responses;
use Thingston\OpenApi\Specification\Servers;

final class PathItemTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        $pathItem = new PathItem('/');

        return $pathItem;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $pathItem = new PathItem('/');
        $pathItem->summary = 'Some summary';
        $pathItem->description = 'Some description';
        $pathItem->get = new Operation(new Responses());
        $pathItem->post = new Operation(new Responses());
        $pathItem->put = new Operation(new Responses());
        $pathItem->patch = new Operation(new Responses());
        $pathItem->delete = new Operation(new Responses());
        $pathItem->head = new Operation(new Responses());
        $pathItem->options = new Operation(new Responses());
        $pathItem->trace = new Operation(new Responses());
        $pathItem->servers = new Servers();
        $pathItem->parameters = new Parameters();

        return $pathItem;
    }
}
