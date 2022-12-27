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
        return new Servers();
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return $servers = new Servers([
            new Server(new Url('http://localhost/api')),
            new Server(new Url('http://example.org/api')),
        ]);
    }
}
