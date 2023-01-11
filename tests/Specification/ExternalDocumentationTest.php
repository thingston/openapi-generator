<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\ExternalDocumentation;
use Thingston\OpenApi\Specification\Url;
use Thingston\OpenApi\Test\AbstractTestCase;

final class ExternalDocumentationTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $docs = new ExternalDocumentation($url = new Url('http://example.org/docs'));

        $this->assertSame($url, $docs->getUrl());

        $this->assertNull($docs->getDescription());
        $docs->setDescription('Some description');
        $this->assertSame('Some description', $docs->getDescription());
    }

    public function testFullSpecification(): void
    {
        $docs = new ExternalDocumentation($url = new Url('http://example.org/docs'), 'Some description');

        $this->assertSame($url, $docs->getUrl());
        $this->assertSame('Some description', $docs->getDescription());
    }

    public function testFactory(): void
    {
        $docs = ExternalDocumentation::create('http://example.org/docs');

        $this->assertSame('http://example.org/docs', (string) $docs->getUrl());
        $this->assertNull($docs->getDescription());
    }
}
