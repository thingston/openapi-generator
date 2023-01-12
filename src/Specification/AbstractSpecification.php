<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use ArrayObject;
use Countable;
use IteratorAggregate;
use JsonSerializable;
use Stringable;
use Traversable;

use function count;
use function json_encode;

/**
 * Base class for all specifications.
 */
abstract class AbstractSpecification implements
    SpecificationInterface,
    JsonSerializable,
    Stringable,
    Countable,
    IteratorAggregate
{
    /**
     * @var string|null
     */
    protected ?string $key = null;

    /**
     * @var array
     */
    protected array $properties = [];

    /**
     * Get key.
     *
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * Output the specification as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];

        foreach ($this->properties as $name => $property) {
            if (null === $property && 'example' !== $name) {
                continue;
            }

            if (is_int($name) && $property instanceof AbstractSpecification && null !== $property->key) {
                $name = $property->key;
            }

            $data[$name] = $property;
        }

        return $data;
    }

    /**
     * JSON representation of the specification.
     *
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return json_encode($this, JSON_PRETTY_PRINT);
    }

    /**
     * Number of properties.
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->properties);
    }

    /**
     * Iterate existing properties.
     *
     * @return Traversable
     */
    public function getIterator(): Traversable
    {
        return new ArrayObject($this->properties);
    }
}
