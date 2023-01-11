<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\MediaTypes;
use Thingston\OpenApi\Specification\RequestBody;
use Thingston\OpenApi\Test\AbstractTestCase;

final class RequestBodyTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $body = new RequestBody($content = new MediaTypes());

        $this->assertSame($content, $body->getContent());

        $this->assertNull($body->getDescription());
        $body->setDescription('Some description');
        $this->assertSame('Some description', $body->getDescription());

        $this->assertNull($body->getRequired());
        $body->setRequired(true);
        $this->assertTrue($body->getRequired());
    }

    public function testFukkSpecification(): void
    {
        $body = new RequestBody(
            $content = new MediaTypes(),
            'Some description',
            true
        );

        $this->assertSame($content, $body->getContent());
        $this->assertSame('Some description', $body->getDescription());
        $this->assertTrue($body->getRequired());
    }
}
