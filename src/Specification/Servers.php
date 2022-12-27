<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * An array of server objects.
 *
 * @method Servers addServer(Server $server)
 */
final class Servers extends AbstractSpecification
{
    public function __construct(array $servers = [])
    {
        foreach ($servers as $server) {
            $this->addServer($server);
        }
    }

    public function assertArrayableType(object $value, string $type = AbstractSpecification::class): void
    {
        parent::assertArrayableType($value, Server::class);
    }
}
