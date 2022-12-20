<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\ExternalDocumentation;
use Thingston\OpenApi\Specification\Operation;
use Thingston\OpenApi\Specification\Parameters;
use Thingston\OpenApi\Specification\Responses;
use Thingston\OpenApi\Specification\Url;

final class OperationTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        $operation = new Operation(new Responses());

        return $operation;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $operation = new Operation(new Responses());
        $operation->tags = ['a', 'b'];
        $operation->summary = 'Some summary';
        $operation->description = 'Some description';
        $operation->externalDocs = new ExternalDocumentation(new Url('http://example.org/docs'));
        $operation->operationId = 'zah123';
        $operation->parameters = new Parameters();

        return $operation;
    }
}
