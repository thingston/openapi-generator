<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\NumericSchema;

final class NumericSchemaTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new NumericSchema('name');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return $schema = (new NumericSchema('name'))
            ->setMinimum(10.0)
            ->setMaximum(100.0)
            ->setExclusiveMinimum(false)
            ->setExclusiveMaximum(false)
            ->setMultipleOf(5.0)
            ->setTitle('Schema title')
            ->setDescription('Some description')
            ->setNullable(false)
            ->setExample(12.5);
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
