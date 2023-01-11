<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\ExternalDocumentation;
use Thingston\OpenApi\Specification\Tag;
use Thingston\OpenApi\Test\AbstractTestCase;

final class TagTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $tag = new Tag('name');

        $this->assertSame('name', $tag->getName());

        $this->assertNull($tag->getDescription());
        $tag->setDescription('Some description');
        $this->assertSame('Some description', $tag->getDescription());

        $this->assertNull($tag->getExternalDocs());
        $tag->setExternalDocs($externalDocs = ExternalDocumentation::create('http://example.org/docs'));
        $this->assertSame($externalDocs, $tag->getExternalDocs());
    }

    public function testFullSpecification(): void
    {
        $tag = new Tag(
            'name',
            'Some description',
            $externalDocs = ExternalDocumentation::create('http://example.org/docs')
        );

        $this->assertSame('name', $tag->getName());
        $this->assertSame('Some description', $tag->getDescription());
        $this->assertSame($externalDocs, $tag->getExternalDocs());
    }
}
