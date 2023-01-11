<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\Example;
use Thingston\OpenApi\Specification\Examples;
use Thingston\OpenApi\Specification\MediaType;
use Thingston\OpenApi\Specification\StringSchema;
use Thingston\OpenApi\Test\AbstractTestCase;

final class MediaTypeTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $type = new MediaType();

        $this->assertSame(MediaType::TYPE_JSON, $type->getKey());

        $this->assertNull($type->getSchema());
        $type->setSchema($schema = new StringSchema('foo'));
        $this->assertSame($schema, $type->getSchema());

        $this->assertNull($type->getExample());
        $type->setExample('some value');
        $this->assertSame('some value', $type->getExample());

        $this->assertNull($type->getExamples());
        $type->setExamples($examples = new Examples());
        $this->assertSame($examples, $type->getExamples());
    }

    public function testFullSpecification(): void
    {
        $type = new MediaType(
            MediaType::TYPE_JSON,
            $schema = new StringSchema('foo'),
            'some value',
            $examples = new Examples()
        );

        $this->assertSame(MediaType::TYPE_JSON, $type->getKey());
        $this->assertSame($schema, $type->getSchema());
        $this->assertSame('some value', $type->getExample());
        $this->assertSame($examples, $type->getExamples());
    }

    public function testFactory(): void
    {
        $type = MediaType::create($schema = StringSchema::create('foo'), MediaType::TYPE_JSON, [
            'examples' => [
                Example::create('bar', 123),
                Example::create('baz', 'zee'),
            ]
        ]);

        $this->assertSame($schema, $type->getSchema());
        $this->assertCount(2, $type->getExamples());
    }
}
