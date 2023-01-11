<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\License;
use Thingston\OpenApi\Specification\Url;
use Thingston\OpenApi\Test\AbstractTestCase;

final class LicenseTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $license = new License('License name');

        $this->assertSame('License name', $license->getName());

        $this->assertNull($license->getUrl());
        $license->setUrl($url = new Url('http://example.org/license'));
        $this->assertSame($url, $license->getUrl());
    }

    public function testFullSpecification(): void
    {
        $license = new License('License name', $url = new Url('http://example.org/license'));

        $this->assertSame('License name', $license->getName());
        $this->assertSame($url, $license->getUrl());
    }

    public function testFactory(): void
    {
        $license = License::create('License name', 'http://example.org/license');

        $this->assertSame('License name', $license->getName());
        $this->assertSame('http://example.org/license', (string) $license->getUrl());
    }
}
