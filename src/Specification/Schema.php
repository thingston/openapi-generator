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
 * @method string getType()
 * @method Schema setType(string $type)
 * @method string|null getTitle()
 * @method Schema setTitle(?string $title)
 * @method string|null getDescription()
 * @method Schema setDescription(?string $description)
 * @method boll|null getNullable()
 * @method Schema setNullable(?bool $nullable)
 * @method mixed getExample()
 * @method Schema setExample(mixed $example)
 */
abstract class Schema extends AbstractSpecification
{
    public const TYPE_STRING = 'string';
    public const TYPE_NUMERIC = 'number';
    public const TYPE_INTEGER = 'integer';
    public const TYPE_BOOLEAN = 'boolean';
    public const TYPE_NULL = 'null';
    public const TYPE_ARRAY = 'array';
    public const TYPE_OBJECT = 'object';

    public function __construct(
        string $key,
        string $type,
        ?string $title = null,
        ?string $description = null,
        ?bool $nullable = null,
        $example = null
    ) {
        $this->assertSchemaType($type);

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

    public function assertSchemaType(string $type): void
    {
        $types = [
            self::TYPE_STRING,
            self::TYPE_NUMERIC,
            self::TYPE_INTEGER,
            self::TYPE_BOOLEAN,
            self::TYPE_NULL,
            self::TYPE_ARRAY,
            self::TYPE_OBJECT,
        ];

        if (false === in_array($type, $types)) {
            $message = sprintf('Type "%s" is invalid; it must be one of "%s".', $type, implode('", "', $types));
            throw new InvalidArgumentException($message);
        }
    }

    public function getRequiredProperties(): array
    {
        return [
            'type' => 'string',
        ];
    }

    public function getOptionalProperties(): array
    {
        return [
            'title' => 'string',
            'description' => 'string',
            'nullable' => 'boolean',
            'example' => 'mixed',
        ];
    }
}
