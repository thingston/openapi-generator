<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

/**
 * The Schema Object allows the definition of input and output data types. These
 * types can be objects, but also primitives and arrays. This object is an
 * extended subset of the JSON Schema Specification Wright Draft 00.
 *
 * @link https://swagger.io/specification/#schema-object
 * @link https://json-schema.org/
 *
 * @see StringSchema
 * @see IntegerSchema
 * @see NumericSchema
 * @see BooleanSchema
 * @see NullSchema
 * @see ArraySchema
 * @see ObjectSchema
 */
abstract class Schema extends AbstractSpecification
{
    /**
     * Schema types
     */
    public const TYPE_STRING = 'string';
    public const TYPE_NUMERIC = 'number';
    public const TYPE_INTEGER = 'integer';
    public const TYPE_BOOLEAN = 'boolean';
    public const TYPE_NULL = 'null';
    public const TYPE_ARRAY = 'array';
    public const TYPE_OBJECT = 'object';

    /**
     * Schema constructor.
     *
     * @param string $key
     * @param string $type
     * @param string|null $title
     * @param string|null $description
     * @param bool|null $nullable
     * @param mixed $example
     */
    public function __construct(
        string $key,
        string $type,
        ?string $title = null,
        ?string $description = null,
        ?bool $nullable = null,
        mixed $example = null
    ) {
        if (false === in_array($type, self::getTypes())) {
            $message = sprintf(
                'Type "%s" is invalid; it must be one of "%s".',
                $type,
                implode('", "', self::getTypes())
            );

            throw new InvalidArgumentException($message);
        }

        $this->key = $key;
        $this->properties['type'] = $type;

        if (null !== $title) {
            $this->properties['title'] = $title;
        }

        if (null !== $description) {
            $this->properties['description'] = $description;
        }

        if (null !== $nullable) {
            $this->properties['nullable'] = $nullable;
        }

        if (null !== $example) {
            $this->properties['example'] = $example;
        }
    }

    /**
     * Get types.
     *
     * @return string[]
     */
    public static function getTypes(): array
    {
        return [
            self::TYPE_STRING,
            self::TYPE_NUMERIC,
            self::TYPE_INTEGER,
            self::TYPE_BOOLEAN,
            self::TYPE_NULL,
            self::TYPE_ARRAY,
            self::TYPE_OBJECT,
        ];
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->properties['type'];
    }

    /**
     * Get title.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->properties['title'] ?? null;
    }

    /**
     * Set title.
     *
     * @param string|null $title
     * @return self
     */
    public function setTitle(?string $title): self
    {
        $this->properties['title'] = $title;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->properties['description'] ?? null;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->properties['description'] = $description;

        return $this;
    }

    /**
     * Get nullable.
     *
     * @return bool|null
     */
    public function getNullable(): ?bool
    {
        return $this->properties['nullable'] ?? null;
    }

    /**
     * Set nullable.
     *
     * @param bool|null $nullable
     * @return self
     */
    public function setNullable(?bool $nullable): self
    {
        $this->properties['nullable'] = $nullable;

        return $this;
    }

    /**
     * Get example.
     *
     * @return mixed
     */
    public function getExample(): mixed
    {
        return $this->properties['example'] ?? null;
    }

    /**
     * Set example.
     *
     * @param mixed $example
     * @return self
     */
    public function setExample(mixed $example): self
    {
        $this->properties['example'] = $example;

        return $this;
    }
}
