<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use stdClass;
use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Schema;
use Thingston\OpenApi\Specification\ObjectSchema;
use Thingston\OpenApi\Specification\Schemas;
use Thingston\OpenApi\Specification\StringSchema;
use Thingston\OpenApi\Test\AbstractTestCase;

final class ObjectSchemaTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $schema = new ObjectSchema('foo');

        $this->assertSame('foo', $schema->getKey());
        $this->assertSame(Schema::TYPE_OBJECT, $schema->getType());

        $this->assertNull($schema->getRequired());
        $schema->setRequired($required = ['bar']);
        $this->assertSame($required, $schema->getRequired());

        $this->assertNull($schema->getProperties());
        $schema->setProperties($properties = new Schemas());
        $this->assertSame($properties, $schema->getProperties());

        $this->assertNull($schema->getAdditionalProperties());
        $schema->setAdditionalProperties(true);
        $this->assertTrue($schema->getAdditionalProperties());

        $this->assertNull($schema->getMinProperties());
        $schema->setMinProperties(1);
        $this->assertSame(1, $schema->getMinProperties());

        $this->assertNull($schema->getMaxProperties());
        $schema->setMaxProperties(10);
        $this->assertSame(10, $schema->getMaxProperties());
    }

    public function testFullSpecification(): void
    {
        $required = ['bar'];
        $properties = new Schemas();

        $schema = new ObjectSchema('foo', $required, $properties, true, 1, 10);

        $this->assertSame('foo', $schema->getKey());
        $this->assertSame(Schema::TYPE_OBJECT, $schema->getType());
        $this->assertSame($required, $schema->getRequired());
        $this->assertSame($properties, $schema->getProperties());
        $this->assertTrue($schema->getAdditionalProperties());
        $this->assertSame(1, $schema->getMinProperties());
        $this->assertSame(10, $schema->getMaxProperties());
    }

    public function testFactory(): void
    {
        $key = 'foo';
        $title = 'Some title';
        $description = 'Some description';
        $nullable = false;
        $example = 123.45;
        $properties = [StringSchema::create('bar')];
        $required = ['bar'];

        $schema = ObjectSchema::create($key, $properties, $required, $title, [
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
        $this->assertInstanceOf(Schemas::class, $schema->getProperties());
        $this->assertSame($required, $schema->getRequired());
    }
}
