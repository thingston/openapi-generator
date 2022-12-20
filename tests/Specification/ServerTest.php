<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Server;
use Thingston\OpenApi\Specification\Url;

final class ServerTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        $server = new Server(new Url('http://example.org'));

        return $server;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $server = new Server(new Url('http://example.org'));
        $server->description = 'Server description';

        return $server;
    }
}
