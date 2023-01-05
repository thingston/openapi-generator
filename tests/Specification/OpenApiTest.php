<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Components;
use Thingston\OpenApi\Specification\Contact;
use Thingston\OpenApi\Specification\ExternalDocumentation;
use Thingston\OpenApi\Specification\Info;
use Thingston\OpenApi\Specification\License;
use Thingston\OpenApi\Specification\OpenApi;
use Thingston\OpenApi\Specification\PathItem;
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

    public function testFactory(): void
    {
        $title = 'API title';
        $version = '1.0';
        $paths = [
            PathItem::create('/foo'),
            PathItem::create('/bar'),
        ];
        $options = [
            'info' => [
                'contact' => Contact::create('Contact Name', 'contact@example.org'),
                'license' => new License('License Name', 'http://example.org/license'),
            ],
        ];

        $api = OpenApi::create($title, $version, $paths, $options);

        $this->assertSame(OpenApi::OA_VERSION, $api->getOpenapi());
        $this->assertSame($title, $api->getInfo()->getTitle());
        $this->assertSame($version, $api->getInfo()->getVersion());
        $this->assertSame($options['info']['contact'], $api->getInfo()->getContact());
    }
}
