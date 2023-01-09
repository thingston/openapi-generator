<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\NumericSchema;
use Thingston\OpenApi\Specification\Schema;
use Thingston\OpenApi\Test\AbstractTestCase;

final class NumericSchemaTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $schema = new NumericSchema('foo');

        $this->assertSame('foo', $schema->getKey());
        $this->assertSame(Schema::TYPE_NUMERIC, $schema->getType());

        $this->assertNull($schema->getMinimum());
        $schema->setMinimum(3.0);
        $this->assertSame(3.0, $schema->getMinimum());

        $this->assertNull($schema->getMaximum());
        $schema->setMaximum(7.0);
        $this->assertSame(7.0, $schema->getMaximum());

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
        $schema = new NumericSchema('foo', 3.0, 7.0, true, true, 2);

        $this->assertSame('foo', $schema->getKey());
        $this->assertSame(Schema::TYPE_NUMERIC, $schema->getType());
        $this->assertSame(3.0, $schema->getMinimum());
        $this->assertSame(7.0, $schema->getMaximum());
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
        $example = 123.45;

        $schema = NumericSchema::create($key, $title, [
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
