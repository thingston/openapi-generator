<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * A simple object to allow referencing other components in the specification,
 * internally and externally.
 *
 * @link https://swagger.io/specification/#reference-object
 */
final class Reference extends AbstractSpecification
{
    public function __construct(string $key, string $ref)
    {
        $this->key = $key;
        $this->properties['$ref'] = $ref;
    }

    public function getRequiredProperties(): array
    {
        return [
            '$ref' => 'string',
        ];
    }

    public function getReference(): string
    {
        return $this->properties['$ref'];
    }

    public function setReference(string $ref): self
    {
        $this->properties['$ref'] = $ref;

        return $this;
    }
}
