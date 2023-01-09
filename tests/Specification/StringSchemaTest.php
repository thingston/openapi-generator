<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\Schema;
use Thingston\OpenApi\Specification\StringSchema;
use Thingston\OpenApi\Test\AbstractTestCase;

final class StringSchemaTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $schema = new StringSchema('foo');

        $this->assertSame('foo', $schema->getKey());
        $this->assertSame(Schema::TYPE_STRING, $schema->getType());

        $this->assertNull($schema->getMinLength());
        $schema->setMinLength(5);
        $this->assertSame(5, $schema->getMinLength());

        $this->assertNull($schema->getMaxLength());
        $schema->setMaxLength(20);
        $this->assertSame(20, $schema->getMaxLength());

        $this->assertNull($schema->getPattern());
        $schema->setPattern('/\w+/');
        $this->assertSame('/\w+/', $schema->getPattern());
    }

    public function testFactory(): void
    {
        $key = 'foo';
        $title = 'Some title';
        $description = 'Some description';
        $nullable = false;
        $example = ['foo', 'bar'];

        $schema = StringSchema::create($key, $title, [
            'title' => 'Ignored title',
            'description' => $description,
            'nullable' => $nullable,
            'example' => $example,
        ]);

        $this->assertSame($key, $schema->getKey());
        $this->assertSame($title, $schema->getTitle());
        $this->assertSame($description, $schema->getDescription());
        $this->assertSame($nullable, $schema->getNullable());
        $this->assertSame($example, $schema->getExample());
    }
}
