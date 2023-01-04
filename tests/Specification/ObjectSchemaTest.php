<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\ObjectSchema;
use Thingston\OpenApi\Specification\Schemas;

final class ObjectSchemaTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new ObjectSchema('name');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new ObjectSchema('name'))
            ->setRequired(['foo'])
            ->setProperties(new Schemas())
            ->setMinProperties(1)
            ->setMaxProperties(3)
            ->setAdditionalProperties(false)
            ->setTitle('Schema title')
            ->setDescription('Some description')
            ->setNullable(false)
            ->setExample(new \stdClass());
    }

    public function testFactory(): void
    {
        $key = 'foo';
        $title = 'Some title';
        $description = 'Some description';
        $nullable = false;
        $example = 123.45;
        $properties = \Thingston\OpenApi\Specification\StringSchema::create('bar');
        $required = ['bar'];

        $schema = ObjectSchema::create($key, $properties, $required, $title, [
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
        $this->assertSame($properties, $schema->getProperties());
        $this->assertSame($required, $schema->getRequired());
    }
}
