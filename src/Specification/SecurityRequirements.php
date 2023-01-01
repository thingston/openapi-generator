<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * An array of securityRequirement objects.
 *
 * @method SecurityRequirements addSecurityRequirement(SecurityRequirement $securityRequirement)
 */
final class SecurityRequirements extends AbstractSpecification
{
    public function __construct(array $securityRequirements = [])
    {
        foreach ($securityRequirements as $securityRequirement) {
            $this->addSecurityRequirement($securityRequirement);
        }
    }

    public function assertArrayableType(object $value, string $type = AbstractSpecification::class): void
    {
        parent::assertArrayableType($value, SecurityRequirement::class);
    }
}
