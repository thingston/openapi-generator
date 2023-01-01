<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * An array of schema objects.
 *
 * @method Schemas addSchema(Schema|Reference $schema)
 */
final class Schemas extends AbstractSpecification
{
    public function __construct(array $schemas = [])
    {
        foreach ($schemas as $schema) {
            $this->addSchema($schema);
        }
    }

    public function assertArrayableType(object $value, string $type = AbstractSpecification::class): void
    {
        parent::assertArrayableType($value, implode('|', [
            Schema::class,
            Reference::class,
        ]));
    }
}
