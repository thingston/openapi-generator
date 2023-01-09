<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\ArraySchema;
use Thingston\OpenApi\Specification\Schema;
use Thingston\OpenApi\Specification\StringSchema;
use Thingston\OpenApi\Test\AbstractTestCase;

final class ArraySchemaTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $schema = new ArraySchema('foo');

        $this->assertSame('foo', $schema->getKey());
        $this->assertSame(Schema::TYPE_ARRAY, $schema->getType());

        $this->assertNull($schema->getItems());
        $schema->setItems($items = new StringSchema('bar'));
        $this->assertSame($items, $schema->getItems());

        $this->assertNull($schema->getAdditionalItems());
        $schema->setAdditionalItems(true);
        $this->assertTrue($schema->getAdditionalItems());

        $this->assertNull($schema->getMinItems());
        $schema->setMinItems(1);
        $this->assertSame(1, $schema->getMinItems());

        $this->assertNull($schema->getMaxItems());
        $schema->setMaxItems(10);
        $this->assertSame(10, $schema->getMaxItems());

        $this->assertNull($schema->getUniqueItems());
        $schema->setUniqueItems(true);
        $this->assertTrue($schema->getUniqueItems());
    }

    public function testFullSpecification(): void
    {
        $items = new StringSchema('bar');
        $schema = new ArraySchema('foo', $items, true, 1, 10, true);

        $this->assertSame(Schema::TYPE_ARRAY, $schema->getType());
        $this->assertSame($items, $schema->getItems());
        $this->assertTrue($schema->getAdditionalItems());
        $this->assertSame(1, $schema->getMinItems());
        $this->assertSame(10, $schema->getMaxItems());
        $this->assertTrue($schema->getUniqueItems());
    }

    public function testFactory(): void
    {
        $key = 'foo';
        $title = 'Some title';
        $description = 'Some description';
        $nullable = false;
        $example = ['foo', 'bar'];
        $items = new StringSchema('bar');

        $schema = ArraySchema::create($key, $items, $title, [
            'title' => 'Ignored title',
            'description' => $description,
            'nullable' => $nullable,
            'example' => $example,
        ]);

        $this->assertSame($key, $schema->getKey());
        $this->assertSame($title, $schema->getTitle());
        $this->assertSame($items, $schema->getItems());
        $this->assertSame($description, $schema->getDescription());
        $this->assertSame($nullable, $schema->getNullable());
        $this->assertSame($example, $schema->getExample());
    }
}
