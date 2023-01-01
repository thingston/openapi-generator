<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\SecurityRequirement;
use Thingston\OpenApi\Test\AbstractTestCase;

final class SecurityRequirementTest extends AbstractTestCase
{
    public function testNonOAuth2Requirement(): void
    {
        $securityRequirement = new SecurityRequirement('key');

        $this->assertSame('key', $securityRequirement->key);
        $this->assertEmpty($securityRequirement->getScopes());
        $this->assertArrayHasKey('key', $securityRequirement->toArray());
        $this->assertSame([], $securityRequirement->toArray()['key']);
    }

    public function testOAuth2Requirement(): void
    {
        $scopes = ['read', 'write'];
        $securityRequirement = new SecurityRequirement('key', $scopes);

        $this->assertSame('key', $securityRequirement->key);
        $this->assertNotEmpty($securityRequirement->getScopes());
        $this->assertArrayHasKey('key', $securityRequirement->toArray());
        $this->assertSame($scopes, $securityRequirement->toArray()['key']);
    }
}
