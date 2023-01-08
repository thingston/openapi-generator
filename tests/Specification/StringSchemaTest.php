<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\StringSchema;

final class StringSchemaTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new StringSchema('name');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new StringSchema('name'))
            ->setMinLength(2)
            ->setMaxLength(20)
            ->setPattern('/\w+/')
            ->setTitle('Schema title')
            ->setDescription('Some description')
            ->setNullable(false)
            ->setExample('foo');
    }

    public function testFactory(): void
    {
        $key = 'foo';
        $title = 'Some title';
        $description = 'Some description';
        $nullable = false;
        $example = ['foo', 'bar'];

        $schema = StringSchema::create($key, $title, [
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
