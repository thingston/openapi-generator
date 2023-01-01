<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\SecurityRequirement;
use Thingston\OpenApi\Specification\SecurityRequirements;

final class SecurityRequirementsTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new SecurityRequirements();
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return new SecurityRequirements([
            new SecurityRequirement('foo'),
            new SecurityRequirement('bar'),
        ]);
    }
}
