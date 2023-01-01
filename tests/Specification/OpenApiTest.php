<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Components;
use Thingston\OpenApi\Specification\ExternalDocumentation;
use Thingston\OpenApi\Specification\Info;
use Thingston\OpenApi\Specification\OpenApi;
use Thingston\OpenApi\Specification\Paths;
use Thingston\OpenApi\Specification\SecurityRequirements;
use Thingston\OpenApi\Specification\Servers;
use Thingston\OpenApi\Specification\Tags;
use Thingston\OpenApi\Specification\Url;

final class OpenApiTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new OpenApi(new Info('API title', '1.0'), new Paths());
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new OpenApi(new Info('API title', '1.0'), new Paths()))
            ->setServers(new Servers())
            ->setComponents(new Components())
            ->setExternalDocs(new ExternalDocumentation(new Url('http://example.org/docs')))
            ->setTags(new Tags())
            ->setSecurity(new SecurityRequirements());
    }
}
