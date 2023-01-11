<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Collection of securityRequirement objects.
 */
final class SecurityRequirements extends AbstractSpecification
{
    /**
     * SecurityRequirements constructor.
     *
     * @param array<SecurityRequirement> $securityRequirements
     */
    public function __construct(array $securityRequirements = [])
    {
        foreach ($securityRequirements as $securityRequirement) {
            $this->addSecurityRequirement($securityRequirement);
        }
    }

    /**
     * Add security requirement.
     *
     * @param SecurityRequirement $securityRequirement
     * @return self
     */
    public function addSecurityRequirement(SecurityRequirement $securityRequirement): self
    {
        $this->properties[] = $securityRequirement;

        return $this;
    }
}
