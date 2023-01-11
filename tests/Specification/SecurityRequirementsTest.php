<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\SecurityRequirement;
use Thingston\OpenApi\Specification\SecurityRequirements;
use Thingston\OpenApi\Test\AbstractTestCase;

final class SecurityRequirementsTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $requirements = new SecurityRequirements([
            new SecurityRequirement('foo'),
        ]);

        $this->assertCount(1, $requirements);

        $requirements->addSecurityRequirement(new SecurityRequirement('bar'));

        $this->assertCount(2, $requirements);
    }
}
