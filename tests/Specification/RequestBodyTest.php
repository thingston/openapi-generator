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
        $requestBody = new RequestBody(new MediaTypes());

        return $requestBody;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $requestBody = new RequestBody(new MediaTypes());
        $requestBody->description = 'Some description';
        $requestBody->required = false;

        return $requestBody;
    }
}
