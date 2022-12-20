<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * @property int|null $minimum
 * @property int|null $maximum
 * @property bool|null $exclusiveMinimum
 * @property bool|null $exclusiveMaximum
 * @property float|null $multipleOf
 */
final class IntegerSchema extends Schema
{
    public function __construct(public string $name)
    {
        parent::__construct($name, self::TYPE_INTEGER);
    }

    public function getOptionalProperties(): array
    {
        return array_merge(parent::getOptionalProperties(), [
            'minimum' => 'integer',
            'maximum' => 'integer',
            'exclusiveMinimum' => 'boolean',
            'exclusiveMaximum' => 'boolean',
            'multipleOf' => 'float',
        ]);
    }
}
