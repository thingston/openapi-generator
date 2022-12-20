<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * @property Schemas|null $schemas
 */
final class Components extends AbstractSpecification
{
    public function getOptionalProperties(): array
    {
        return [
            'schemas' => Schemas::class,
        ];
    }
}
