<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Numeric schema object.
 *
 * @link https://cswr.github.io/JsonSchema/spec/basic_types/#numeric-schemas
 *
 * @method float|null getMinimum()
 * @method NumericSchema setMinimum(?float $minimum)
 * @method float|null getMaximum()
 * @method NumericSchema setMaximum(?float $maximum)
 * @method bool|null getExclusiveMinimum()
 * @method NumericSchema setExclusiveMinimum(?bool $exclusiveMinimum)
 * @method bool|null getExclusiveMaximum()
 * @method NumericSchema setExclusiveMaximum(?bool $exclusiveMaximum)
 * @method float|null getMultipleOf()
 * @method NumericSchema setMultipleOf(?float $multipleOf)
 */
final class NumericSchema extends Schema
{
    public function __construct(string $key)
    {
        parent::__construct($key, self::TYPE_NUMERIC);
    }

    public function getOptionalProperties(): array
    {
        return array_merge(parent::getOptionalProperties(), [
            'minimum' => 'float',
            'maximum' => 'float',
            'exclusiveMinimum' => 'boolean',
            'exclusiveMaximum' => 'boolean',
            'multipleOf' => 'float|integer',
        ]);
    }
}
