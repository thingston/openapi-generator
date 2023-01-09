<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

/**
 * Integer schema object.
 *
 * @link https://swagger.io/specification/#schema-object
 * @link https://cswr.github.io/JsonSchema/spec/basic_types/#integer-schemas
 */
final class IntegerSchema extends Schema
{
    /**
     * IntegerSchema constructor.
     *
     * @param string $key
     * @param int|null $minimum
     * @param int|null $maximum
     * @param bool|null $exclusiveMinimum
     * @param bool|null $exclusiveMaximum
     * @param int|float|null $multipleOf
     * @param string|null $title
     * @param string|null $description
     * @param bool|null $nullable
     * @param mixed $example
     */
    public function __construct(
        string $key,
        ?int $minimum = null,
        ?int $maximum = null,
        ?bool $exclusiveMinimum = null,
        ?bool $exclusiveMaximum = null,
        mixed $multipleOf = null,
        ?string $title = null,
        ?string $description = null,
        ?bool $nullable = null,
        mixed $example = null
    ) {
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

        if (false === is_int($multipleOf) && false === is_float($multipleOf) && false === is_null($multipleOf)) {
            throw new InvalidArgumentException('Argument "multipleOf" must be of type integer, float or null.');
        }

        if (null !== $multipleOf) {
            $this->properties['multipleOf'] = $multipleOf;
        }
    }

    /**
     * Get minimum.
     *
     * @return int|null
     */
    public function getMinimum(): ?int
    {
        return $this->properties['minimum'] ?? null;
    }

    /**
     * Set minimum.
     *
     * @param int|null $minimum
     * @return self
     */
    public function setMinimum(?int $minimum): self
    {
        $this->properties['minimum'] = $minimum;

        return $this;
    }

    /**
     * Get maximum.
     *
     * @return int|null
     */
    public function getMaximum(): ?int
    {
        return $this->properties['maximum'] ?? null;
    }

    /**
     * Set maximum.
     *
     * @param int|null $maximum
     * @return self
     */
    public function setMaximum(?int $maximum): self
    {
        $this->properties['maximum'] = $maximum;

        return $this;
    }

    /**
     * Get exclusive minimum.
     *
     * @return bool|null
     */
    public function getExclusiveMinimum(): ?bool
    {
        return $this->properties['exclusiveMinimum'] ?? null;
    }

    /**
     * Set exclusive minimum.
     *
     * @param bool|null $exclusiveMinimum
     * @return self
     */
    public function setExclusiveMinimum(?bool $exclusiveMinimum): self
    {
        $this->properties['exclusiveMinimum'] = $exclusiveMinimum;

        return $this;
    }

    /**
     * Get exclusive maximum.
     *
     * @return bool|null
     */
    public function getExclusiveMaximum(): ?bool
    {
        return $this->properties['exclusiveMaximum'] ?? null;
    }

    /**
     * Set exclusive maximum.
     *
     * @param bool|null $exclusiveMaximum
     * @return self
     */
    public function setExclusiveMaximum(?bool $exclusiveMaximum): self
    {
        $this->properties['exclusiveMaximum'] = $exclusiveMaximum;

        return $this;
    }

    /**
     * Get multiple of.
     *
     * @return int|float|null
     */
    public function getMultipleOf(): mixed
    {
        return $this->properties['multipleOf'] ?? null;
    }

    /**
     * Set multiple of.
     *
     * @param int|float|null $multipleOf
     * @return self
     */
    public function setMultipleOf(mixed $multipleOf): self
    {
        if (false === is_int($multipleOf) && false === is_float($multipleOf) && false === is_null($multipleOf)) {
            throw new InvalidArgumentException('Argument "multipleOf" must be of type integer, float or null.');
        }

        $this->properties['multipleOf'] = $multipleOf;

        return $this;
    }

    /**
     * Create IntegerSchema instance.
     *
     * @param string $key
     * @param string|null $title
     * @param array $options
     * @return self
     */
    public static function create(string $key, ?string $title = null, array $options = []): self
    {
        $parameters = array_merge($options, [
            'key' => $key,
            'title' => $title,
        ]);

        return new self(...$parameters);
    }
}
