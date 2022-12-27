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
        return new PathItem('/');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new PathItem('/'))
            ->setSummary('Some summary')
            ->setDescription('Some description')
            ->setGet(new Operation(new Responses()))
            ->setPost(new Operation(new Responses()))
            ->setPut(new Operation(new Responses()))
            ->setPatch(new Operation(new Responses()))
            ->setDelete(new Operation(new Responses()))
            ->setHead(new Operation(new Responses()))
            ->setOptions(new Operation(new Responses()))
            ->setTrace(new Operation(new Responses()))
            ->setServers(new Servers())
            ->setParameters(new Parameters());
    }
}
