<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Header;
use Thingston\OpenApi\Specification\StringSchema;

final class HeaderTest extends \Thingston\OpenApi\Test\AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $header = new Header('Content-Type');

        $this->assertSame('Content-Type', $header->getKey());

        $this->assertNull($header->getDescription());
        $header->setDescription('Some description');
        $this->assertSame('Some description', $header->getDescription());

        $this->assertNull($header->getRequired());
        $header->setRequired(true);
        $this->assertTrue($header->getRequired());

        $this->assertNull($header->getDeprecated());
        $header->setDeprecated(true);
        $this->assertTrue($header->getDeprecated());

        $this->assertNull($header->getAllowEmptyValue());
        $header->setAllowEmptyValue(true);
        $this->assertTrue($header->getAllowEmptyValue());
    }

    public function testFullSpecification(): void
    {
        $header = new Header('Content-Type', 'Some description', true, true, true);

        $this->assertSame('Content-Type', $header->getKey());
        $this->assertSame('Some description', $header->getDescription());
        $this->assertTrue($header->getRequired());
        $this->assertTrue($header->getDeprecated());
        $this->assertTrue($header->getAllowEmptyValue());
    }

    public function testFactory(): void
    {
        $header = Header::create('Content-Type');

        $this->assertSame('Content-Type', $header->getKey());
    }
}
