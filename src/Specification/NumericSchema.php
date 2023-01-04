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
    public function __construct(
        string $key,
        ?float $minimum = null,
        ?float $maximum = null,
        ?bool $exclusiveMinimum = null,
        ?bool $exclusiveMaximum = null,
        $multipleOf = null,
        ?string $title = null,
        ?string $description = null,
        ?bool $nullable = null,
        $example = null
    ) {
        $this->assertPropertyType('multipleOf', $multipleOf);

        parent::__construct($key, self::TYPE_NUMERIC, $title, $description, $nullable, $example);

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

    public static function create(string $key, ?string $title = null, array $options = []): self
    {
        $parameters = array_merge($options, [
            'key' => $key,
            'title' => $title,
        ]);

        return new self(...$parameters);
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
