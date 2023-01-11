<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

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
use Thingston\OpenApi\Test\AbstractTestCase;

final class OpenApiTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $api = new OpenApi(
            $info = new Info('API title', '1.0'),
            $paths = new Paths()
        );

        $this->assertSame($info, $api->getInfo());
        $this->assertSame($paths, $api->getPaths());
        $this->assertSame(OpenApi::OA_VERSION, $api->getOpenapi());

        $this->assertNull($api->getServers());
        $api->setServers($servers = new Servers());
        $this->assertSame($servers, $api->getServers());

        $this->assertNull($api->getComponents());
        $api->setComponents($components = new Components());
        $this->assertSame($components, $api->getComponents());

        $this->assertNull($api->getExternalDocs());
        $api->setExternalDocs($externalDocs = ExternalDocumentation::create('http://example.org/docs'));
        $this->assertSame($externalDocs, $api->getExternalDocs());

        $this->assertNull($api->getTags());
        $api->setTags($tags = new Tags());
        $this->assertSame($tags, $api->getTags());

        $this->assertNull($api->getSecurity());
        $api->setSecurity($security = new SecurityRequirements());
        $this->assertSame($security, $api->getSecurity());
    }

    public function testFullSpecification(): void
    {
        $api = new OpenApi(
            $info = new Info('API title', '1.0'),
            $paths = new Paths(),
            OpenApi::OA_VERSION,
            $servers = new Servers(),
            $components = new Components(),
            $externalDocs = ExternalDocumentation::create('http://example.org/docs'),
            $tags = new Tags(),
            $security = new SecurityRequirements()
        );

        $this->assertSame($info, $api->getInfo());
        $this->assertSame($paths, $api->getPaths());
        $this->assertSame(OpenApi::OA_VERSION, $api->getOpenapi());
        $this->assertSame($servers, $api->getServers());
        $this->assertSame($components, $api->getComponents());
        $this->assertSame($externalDocs, $api->getExternalDocs());
        $this->assertSame($tags, $api->getTags());
        $this->assertSame($security, $api->getSecurity());
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
                'license' => new License('License Name', new Url('http://example.org/license')),
            ],
        ];

        $api = OpenApi::create($title, $version, $paths, $options);

        $this->assertSame(OpenApi::OA_VERSION, $api->getOpenapi());
        $this->assertSame($title, $api->getInfo()->getTitle());
        $this->assertSame($version, $api->getInfo()->getVersion());
        $this->assertSame($options['info']['contact'], $api->getInfo()->getContact());
    }
}
