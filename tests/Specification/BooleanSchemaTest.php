<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\BooleanSchema;
use Thingston\OpenApi\Specification\Schema;
use Thingston\OpenApi\Test\AbstractTestCase;

final class BooleanSchemaTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $schema = new BooleanSchema('foo');

        $this->assertSame('foo', $schema->getKey());
        $this->assertSame(Schema::TYPE_BOOLEAN, $schema->getType());
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

        $this->assertSame($key, $schema->getKey());
        $this->assertSame($title, $schema->getTitle());
        $this->assertSame($description, $schema->getDescription());
        $this->assertSame($nullable, $schema->getNullable());
        $this->assertSame($example, $schema->getExample());
    }
}
