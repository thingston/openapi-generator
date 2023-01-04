<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\BooleanSchema;

final class BooleanSchemaTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new BooleanSchema('name');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return $schema = (new BooleanSchema('name'))
            ->setTitle('Schema title')
            ->setDescription('Some description')
            ->setNullable(false)
            ->setExample(true);
    }

    public function testFactory(): void
    {
        $key = 'foo';
        $title = 'Some title';
        $description = 'Some description';
        $nullable = false;
        $example = true;

        $schema = BooleanSchema::create($key, $title, [
            'title' => 'Ignored title',
            'description' => $description,
            'nullable' => $nullable,
            'example' => $example,
        ]);

        $this->assertSame($key, $schema->key);
        $this->assertSame($title, $schema->getTitle());
        $this->assertSame($description, $schema->getDescription());
        $this->assertSame($nullable, $schema->getNullable());
        $this->assertSame($example, $schema->getExample());
    }
}
