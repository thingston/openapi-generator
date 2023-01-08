<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\IntegerSchema;

final class IntegerSchemaTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new IntegerSchema('name');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new IntegerSchema('name'))
            ->setMinimum(10)
            ->setMaximum(100)
            ->setExclusiveMinimum(false)
            ->setExclusiveMaximum(false)
            ->setMultipleOf(5.0)
            ->setTitle('Schema title')
            ->setDescription('Some description')
            ->setNullable(false)
            ->setExample(123);
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
