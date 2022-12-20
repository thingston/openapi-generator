<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * @property float|null $minimum
 * @property float|null $maximum
 * @property bool|null $exclusiveMinimum
 * @property bool|null $exclusiveMaximum
 * @property float|null $multipleOf
 */
final class NumberSchema extends Schema
{
    public function __construct(public string $name)
    {
        parent::__construct($name, self::TYPE_NUMBER);
    }

    public function getOptionalProperties(): array
    {
        return array_merge(parent::getOptionalProperties(), [
            'minimum' => 'float',
            'maximum' => 'float',
            'exclusiveMinimum' => 'boolean',
            'exclusiveMaximum' => 'boolean',
            'multipleOf' => 'float',
        ]);
    }
}
