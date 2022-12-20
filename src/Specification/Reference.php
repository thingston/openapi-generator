<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * @property string $ref
 */
final class Reference extends AbstractSpecification
{
    public function __construct(public string $name, string $ref)
    {
        $this->name = $name;
        $this->properties['$ref'] = $ref;
    }

    public function getRequiredProperties(): array
    {
        return [
            '$ref' => 'string',
        ];
    }
}
