<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\Server;
use Thingston\OpenApi\Specification\Servers;
use Thingston\OpenApi\Test\AbstractTestCase;

final class ServersTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $servers = new Servers([
            Server::create('http://localhost'),
        ]);

        $this->assertCount(1, $servers);

        $servers->addServer(Server::create('http://example.org'));

        $this->assertCount(2, $servers);
    }
}
