<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\Server;
use Thingston\OpenApi\Specification\ServerVariables;
use Thingston\OpenApi\Specification\Url;
use Thingston\OpenApi\Test\AbstractTestCase;

final class ServerTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $server = new Server($url = new Url('http://example.org'));

        $this->assertSame($url, $server->getUrl());

        $this->assertNull($server->getDescription());
        $server->setDescription('Some description');
        $this->assertSame('Some description', $server->getDescription());

        $this->assertNull($server->getVariables());
        $server->setVariables($variables = new ServerVariables());
        $this->assertSame($variables, $server->getVariables());
    }

    public function testFullSpecification(): void
    {
        $server = new Server(
            $url = new Url('http://example.org'),
            'Some description',
            $variables = new ServerVariables()
        );

        $this->assertSame($url, $server->getUrl());
        $this->assertSame('Some description', $server->getDescription());
        $this->assertSame($variables, $server->getVariables());
    }

    public function testFactory(): void
    {
        $server = Server::create('http://example.org');

        $this->assertSame('http://example.org', (string) $server->getUrl());
    }
}
