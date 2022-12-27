<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\MediaTypes;
use Thingston\OpenApi\Specification\RequestBody;

final class RequestBodyTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new RequestBody(new MediaTypes());
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new RequestBody(new MediaTypes()))
            ->setDescription('Some description')
            ->setRequired(true);
    }
}
