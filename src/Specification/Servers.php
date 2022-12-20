<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

final class Servers extends AbstractSpecification
{
    public function __construct(array $servers = [])
    {
        foreach ($servers as $server) {
            $this->add($server);
        }
    }

    public function assertArrayableType(object $value, string $type = AbstractSpecification::class): void
    {
        parent::assertArrayableType($value, Server::class);
    }
}
