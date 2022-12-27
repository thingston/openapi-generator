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
        return new Server(new Url('http://example.org'));
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new Server(new Url('http://example.org')))
            ->setDescription('Some description');
    }
}
