<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Integer schema object.
 *
 * @link https://cswr.github.io/JsonSchema/spec/basic_types/#integer-schemas
 *
 * @method int|null getMinimum()
 * @method NumericSchema setMinimum(?float $minimum)
 * @method int|null getMaximum()
 * @method NumericSchema setMaximum(?float $maximum)
 * @method bool|null getExclusiveMinimum()
 * @method NumericSchema setExclusiveMinimum(?bool $exclusiveMinimum)
 * @method bool|null getExclusiveMaximum()
 * @method NumericSchema setExclusiveMaximum(?bool $exclusiveMaximum)
 * @method float|null getMultipleOf()
 * @method NumericSchema setMultipleOf(?float $multipleOf)
 */
final class IntegerSchema extends Schema
{
    public function __construct(
        string $key,
        ?int $minimum = null,
        ?int $maximum = null,
        ?bool $exclusiveMinimum = null,
        ?bool $exclusiveMaximum = null,
        $multipleOf = null,
        ?string $title = null,
        ?string $description = null,
        ?bool $nullable = null,
        $example = null
    ) {
        $this->assertPropertyType('multipleOf', $multipleOf);

        parent::__construct($key, self::TYPE_INTEGER, $title, $description, $nullable, $example);

        if (null !== $minimum) {
            $this->properties['minimum'] = $minimum;
        }

        if (null !== $maximum) {
            $this->properties['maximum'] = $maximum;
        }

        if (null !== $exclusiveMinimum) {
            $this->properties['exclusiveMinimum'] = $exclusiveMinimum;
        }

        if (null !== $exclusiveMaximum) {
            $this->properties['exclusiveMaximum'] = $exclusiveMaximum;
        }

        if (null !== $multipleOf) {
            $this->properties['multipleOf'] = $multipleOf;
        }
    }

    public function getOptionalProperties(): array
    {
        return array_merge(parent::getOptionalProperties(), [
            'minimum' => 'integer',
            'maximum' => 'integer',
            'exclusiveMinimum' => 'boolean',
            'exclusiveMaximum' => 'boolean',
            'multipleOf' => 'float|integer',
        ]);
    }
}
