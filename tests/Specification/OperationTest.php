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
        return new Operation(new Responses());
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new Operation(new Responses()))
            ->setSummary('Some summary')
            ->setDescription('Some description')
            ->setExternalDocs(new ExternalDocumentation(new Url('http://example.org/docs')))
            ->setOperationId('zah123')
            ->setParameters(new Parameters());
    }
}
