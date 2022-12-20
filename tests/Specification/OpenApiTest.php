<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\Info;
use Thingston\OpenApi\Specification\OpenApi;

final class OpenApiTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): \Thingston\OpenApi\Specification\AbstractSpecification
    {
        $info = new Info('API title', '1.0');
        $api = new OpenApi($info);

        return $api;
    }

    public function createFullSpecification(): \Thingston\OpenApi\Specification\AbstractSpecification
    {
        $info = new Info('API title', '1.0');
        $api = new OpenApi($info);

        return $api;
    }
}
