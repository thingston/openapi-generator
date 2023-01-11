<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Collection of serverVariable objects.
 */
final class ServerVariables extends AbstractSpecification
{
    /**
     * ServerVariables construct.
     *
     * @param array<ServerVariable> $serverVariables
     */
    public function __construct(array $serverVariables = [])
    {
        foreach ($serverVariables as $serverVariable) {
            $this->addServerVariable($serverVariable);
        }
    }

    /**
     * Add server variable.
     *
     * @param ServerVariable $serverVariable
     * @return self
     */
    public function addServerVariable(ServerVariable $serverVariable): self
    {
        $this->properties[] = $serverVariable;

        return $this;
    }
}
