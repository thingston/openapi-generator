<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\IntegerSchema;
use Thingston\OpenApi\Specification\Schema;
use Thingston\OpenApi\Test\AbstractTestCase;

final class IntegerSchemaTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $schema = new IntegerSchema('foo');

        $this->assertSame('foo', $schema->getKey());
        $this->assertSame(Schema::TYPE_INTEGER, $schema->getType());

        $this->assertNull($schema->getMinimum());
        $schema->setMinimum(3);
        $this->assertSame(3, $schema->getMinimum());

        $this->assertNull($schema->getMaximum());
        $schema->setMaximum(7);
        $this->assertSame(7, $schema->getMaximum());

        $this->assertNull($schema->getExclusiveMinimum());
        $schema->setExclusiveMinimum(true);
        $this->assertTrue($schema->getExclusiveMinimum());

        $this->assertNull($schema->getExclusiveMaximum());
        $schema->setExclusiveMaximum(true);
        $this->assertTrue($schema->getExclusiveMaximum());

        $this->assertNull($schema->getMultipleOf());
        $schema->setMultipleOf(2);
        $this->assertSame(2, $schema->getMultipleOf());
    }

    public function testFullSpecification(): void
    {
        $schema = new IntegerSchema('foo', 3, 7, true, true, 2);

        $this->assertSame('foo', $schema->getKey());
        $this->assertSame(Schema::TYPE_INTEGER, $schema->getType());
        $this->assertSame(3, $schema->getMinimum());
        $this->assertSame(7, $schema->getMaximum());
        $this->assertTrue($schema->getExclusiveMinimum());
        $this->assertTrue($schema->getExclusiveMaximum());
        $this->assertSame(2, $schema->getMultipleOf());
    }

    public function testFactory(): void
    {
        $key = 'foo';
        $title = 'Some title';
        $description = 'Some description';
        $nullable = false;
        $example = 123;

        $schema = IntegerSchema::create($key, $title, [
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
