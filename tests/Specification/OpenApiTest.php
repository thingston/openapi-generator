<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Components;
use Thingston\OpenApi\Specification\ExternalDocumentation;
use Thingston\OpenApi\Specification\Info;
use Thingston\OpenApi\Specification\OpenApi;
use Thingston\OpenApi\Specification\Paths;
use Thingston\OpenApi\Specification\Servers;
use Thingston\OpenApi\Specification\Url;

final class OpenApiTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        $api = new OpenApi(new Info('API title', '1.0'), new Paths());

        return $api;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $api = new OpenApi(new Info('API title', '1.0'), new Paths());
        $api->servers = new Servers();
        $api->components = new Components();
        $api->externalDocs = new ExternalDocumentation(new Url('http://example.org/docs'));

        return $api;
    }
}
