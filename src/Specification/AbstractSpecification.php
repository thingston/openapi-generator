<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use ArrayAccess;
use ArrayObject;
use Countable;
use IteratorAggregate;
use JsonSerializable;
use Stringable;
use Thingston\OpenApi\Exception\InvalidArgumentException;
use Traversable;

use function count;
use function json_encode;

abstract class AbstractSpecification implements
    SpecificationInterface,
    JsonSerializable,
    Stringable,
    Countable,
    IteratorAggregate,
    ArrayAccess
{
    public ?string $key = null;
    protected array $properties = [];

    public function getRequiredProperties(): array
    {
        return [];
    }

    public function getOptionalProperties(): array
    {
        return [];
    }

    public function getAllProperties(): array
    {
        return array_merge($this->getRequiredProperties(), $this->getOptionalProperties());
    }

    public function isRequiredProperty(string $name): bool
    {
        return array_key_exists($name, $this->getRequiredProperties());
    }

    public function isOptionalProperty(string $name): bool
    {
        return array_key_exists($name, $this->getOptionalProperties());
    }

    public function isProperty(string $name): bool
    {
        return $this->isRequiredProperty($name) || $this->isOptionalProperty($name);
    }

    protected function assertPropertyExists(string $name): void
    {
        if (false === $this->isProperty($name)) {
            $message = sprintf('Property "%s" not found in class "%s".', $name, get_class($this));
            throw new InvalidArgumentException($message);
        }
    }

    protected function assertPropertyNullable(string $name, $value): void
    {
        if (null === $value && $this->isRequiredProperty($name)) {
            $message = sprintf('Property "%s" of class "%s" can\'t bel "null".', $name, get_class($this));
            throw new InvalidArgumentException($message);
        }
    }

    protected function assertPropertyType(string $name, $value): void
    {
        $this->assertPropertyExists($name);
        $this->assertPropertyNullable($name, $value);

        $expected = explode('|', $this->getAllProperties()[$name]);
        $type = gettype($value);

        if (null === $value || in_array($type, $expected) || in_array('mixed', $expected)) {
            return;
        }

        if (in_array('float', $expected) && in_array($type, ['integer', 'float', 'double', 'real'])) {
            return;
        }

        if ('object' === $type) {
            foreach ($expected as $class) {
                if (is_a($value, $class)) {
                    return;
                }
            }

            $type = get_class($value);
        }

        $message = sprintf(
            'Property "%s" of class "%s" must be of the type "%s" and can\'t be "%s".',
            $name,
            get_class($this),
            implode('", "', $expected),
            $type
        );

        throw new InvalidArgumentException($message);
    }

    public function toArray(): array
    {
        $data = [];

        foreach ($this->properties as $name => $property) {
            if (null === $property) {
                continue;
            }

            if (is_int($name) && $property instanceof AbstractSpecification && null !== $property->key) {
                $name = $property->key;
            }

            $data[$name] = $property;
        }

        return $data;
    }

    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }

    public function __toString(): string
    {
        return json_encode($this, JSON_PRETTY_PRINT);
    }

    protected function assertMethodExists(string $name): void
    {
        $action = substr($name, 0, 3);
        $property = lcfirst(substr($name, 3));

        try {
            $this->assertPropertyExists($property);

            if ('add' === $action) {
                $this->assertIsArrayable();
            }

            if (false === in_array($action, ['get', 'set', 'add'])) {
                throw new InvalidArgumentException();
            }
        } catch (InvalidArgumentException $e) {
            $message = sprintf('Method "%s" not found in class "%s".', $name, get_class($this));
            throw new InvalidArgumentException($message);
        }
    }

    public function __call(string $name, array $arguments): mixed
    {
        $this->assertMethodExists($name);

        $action = substr($name, 0, 3);
        $property = lcfirst(substr($name, 3));

        if ('get' === $action) {
            return $this->properties[$property] ?? null;
        }

        if (1 > count($arguments)) {
            $message = sprintf('Method "%s" of class "%s" requires at least 1 argument.', $name, get_class($this));
            throw new InvalidArgumentException($message);
        }

        $value = $arguments[0];

        if ('add' === $action) {
            $this->assertArrayableType($value);
            $this->properties[] = $value;

            return $this->add($value);
        }

        $this->assertPropertyType($property, $value);
        $this->properties[$property] = $value;

        return $this;
    }

    public function __set($name, $value): void
    {
        $this->assertPropertyType($name, $value);
        $this->properties[$name] = $value;
    }

    public function __get($name)
    {
        $this->assertPropertyExists($name);

        return $this->properties[$name] ?? null;
    }

    public function count(): int
    {
        return count($this->properties);
    }

    public function getIterator(): Traversable
    {
        return new ArrayObject($this->properties);
    }

    public function offsetExists($offset): bool
    {
        return isset($this->properties[$offset]);
    }

    public function offsetGet($offset): mixed
    {
        return $this->properties[$offset];
    }

    protected function assertIsArrayable(): void
    {
        if (count($this->getAllProperties())) {
            $message = sprintf('Class "%s" can\'t be used as an array.', get_class($this));
            throw new InvalidArgumentException($message);
        }
    }

    protected function assertArrayableType(object $value, string $type = AbstractSpecification::class): void
    {
        $acceptables = explode('|', $type);

        foreach ($acceptables as $acceptable) {
            if (is_a($value, $acceptable)) {
                return;
            }
        }

        $message = sprintf(
            'Class "%s" only accepts elements of type "%s".',
            get_class($this),
            implode('", "', $acceptables)
        );

        throw new InvalidArgumentException($message);
    }

    public function offsetSet($offset, $value): void
    {
        if (is_string($offset)) {
            $this->$offset = $value;

            return;
        }

        $this->add($value);
    }

    public function offsetUnset($offset): void
    {
        unset($this->properties[$offset]);
    }

    public function add(AbstractSpecification $specification): self
    {
        $this->assertIsArrayable();
        $this->assertArrayableType($specification);

        $this->properties[] = $specification;

        return $this;
    }
}
