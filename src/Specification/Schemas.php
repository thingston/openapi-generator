<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

final class Schemas extends AbstractSpecification
{
    public function __construct(array $schemas = [])
    {
        foreach ($schemas as $schema) {
            $this->add($schema);
        }
    }

    public function add(AbstractSpecification $specification): AbstractSpecification
    {
        if (false === $specification instanceof Schema && false === $specification instanceof Reference) {
            $message = sprintf(
                'Class "%s" only accepts elements of type "%s" or "%s".',
                get_class($this),
                Schema::class,
                Reference::class
            );

            throw new InvalidArgumentException($message);
        }

        return parent::add($specification);
    }

    public function toArray(): array
    {
        $schemas = [];

        foreach ($this->properties as $schema) {
            $schemas[$schema->name] = $schema;
        }

        return $schemas;
    }
}
