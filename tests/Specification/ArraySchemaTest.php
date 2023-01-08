<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\ArraySchema;
use Thingston\OpenApi\Specification\StringSchema;

final class ArraySchemaTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new ArraySchema('name');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new ArraySchema('name'))
            ->setItems(new StringSchema('item'))
            ->setAdditionalItems(false)
            ->setMinItems(3)
            ->setMaxItems(7)
            ->setUniqueItems(true)
            ->setTitle('Schema title')
            ->setDescription('Some description')
            ->setNullable(false)
            ->setExample(['foo', 'bar']);
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
