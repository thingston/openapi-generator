<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\Schema;
use Thingston\OpenApi\Test\AbstractTestCase;

final class SchemaTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        /** @var Schema $schema */
        $schema = $this->getMockForAbstractClass(Schema::class, [
            'key' => 'foo',
            'type' => Schema::TYPE_STRING,
        ]);

        $this->assertSame('foo', $schema->getKey());
        $this->assertSame(Schema::TYPE_STRING, $schema->getType());

        $this->assertNull($schema->getTitle());
        $schema->setTitle('Some title');
        $this->assertSame('Some title', $schema->getTitle());

        $this->assertNull($schema->getDescription());
        $schema->setDescription('Some description');
        $this->assertSame('Some description', $schema->getDescription());

        $this->assertNull($schema->getNullable());
        $schema->setNullable(true);
        $this->assertTrue($schema->getNullable());

        $this->assertNull($schema->getExample());
        $schema->setExample('bar');
        $this->assertSame('bar', $schema->getExample());
    }

    public function testFullSpecification(): void
    {
        /** @var Schema $schema */
        $schema = $this->getMockForAbstractClass(Schema::class, [
            'key' => 'foo',
            'type' => Schema::TYPE_STRING,
            'title' => 'Some title',
            'description' => 'Some description',
            'nullable' => true,
            'example' => 'bar',
        ]);

        $this->assertSame('foo', $schema->getKey());
        $this->assertSame(Schema::TYPE_STRING, $schema->getType());
        $this->assertSame('Some title', $schema->getTitle());
        $this->assertSame('Some description', $schema->getDescription());
        $this->assertTrue($schema->getNullable());
        $this->assertSame('bar', $schema->getExample());
    }
}
