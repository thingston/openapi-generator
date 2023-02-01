<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

/**
 * Collection of Schema objects.
 */
final class Schemas extends AbstractSpecification
{
    /**
     * Schemas constructor.
     *
     * @param array<Schema|SchemaReference> $schemas
     */
    public function __construct(array $schemas = [])
    {
        foreach ($schemas as $schema) {
            $this->addSchema($schema);
        }
    }

    /**
     * Add schema.
     *
     * @param Schema|SchemaReference $schema
     * @return self
     * @throws InvalidArgumentException
     */
    public function addSchema(mixed $schema): self
    {
        if (false === $schema instanceof Schema && false === $schema instanceof SchemaReference) {
            throw new InvalidArgumentException('Argument "schema" must be of type Schema or SchemaReference');
        }

        $this->properties[] = $schema;

        return $this;
    }
}
