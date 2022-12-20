<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Server;
use Thingston\OpenApi\Specification\Servers;
use Thingston\OpenApi\Specification\Url;

final class ServersTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        $servers = new Servers();

        return $servers;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $servers = new Servers([
            new Server(new Url('http://localhost/api')),
            new Server(new Url('http://example.org/api')),
        ]);

        return $servers;
    }
}
