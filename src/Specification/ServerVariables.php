<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * An array of serverVariable objects.
 *
 * @method ServerVariables addServerVariable(ServerVariable $serverVariable)
 */
final class ServerVariables extends AbstractSpecification
{
    public function __construct(array $serverVariables = [])
    {
        foreach ($serverVariables as $serverVariable) {
            $this->addServerVariable($serverVariable);
        }
    }

    public function assertArrayableType(object $value, string $type = AbstractSpecification::class): void
    {
        parent::assertArrayableType($value, ServerVariable::class);
    }
}
