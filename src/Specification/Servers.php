<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Collection of server objects.
 */
final class Servers extends AbstractSpecification
{
    /**
     * Servers constructor.
     *
     * @param array<Server> $servers
     */
    public function __construct(array $servers = [])
    {
        foreach ($servers as $server) {
            $this->addServer($server);
        }
    }

    /**
     * Add server.
     *
     * @param Server $server
     * @return self
     */
    public function addServer(Server $server): self
    {
        $this->properties[] = $server;

        return $this;
    }
}
