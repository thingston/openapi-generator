<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

/**
 * @property string $name
 * @property string $type
 * @property string|null $title
 * @property string|null $description
 * @property bool|null $nullable
 */
abstract class Schema extends AbstractSpecification
{
    public const TYPE_STRING = 'string';
    public const TYPE_NUMBER = 'number';
    public const TYPE_INTEGER = 'integer';
    public const TYPE_BOOLEAN = 'boolean';
    public const TYPE_NULL = 'null';
    public const TYPE_ARRAY = 'array';
    public const TYPE_OBJECT = 'object';

    public function __construct(public string $name, string $type)
    {
        $this->assertSchemaType($type);

        $this->name = $name;
        $this->properties['type'] = $type;
    }

    public function assertSchemaType(string $type): void
    {
        $types = [
            self::TYPE_STRING,
            self::TYPE_NUMBER,
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
        ];
    }
}
