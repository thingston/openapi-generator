<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

/**
 * @property array|null $required
 * @property Schemas|null $properties
 * @property bool|null $additionalProperties
 * @property int|null $minProperties
 * @property int|null $maxProperties
 */
final class ObjectSchema extends Schema
{
    public function __construct(public string $name)
    {
        parent::__construct($name, self::TYPE_OBJECT);
    }

    public function getOptionalProperties(): array
    {
        return array_merge(parent::getOptionalProperties(), [
            'required' => 'array',
            'properties' => Schemas::class,
            'additionalProperties' => 'boolean',
            'minProperties' => 'integer',
            'maxProperties' => 'integer',
        ]);
    }

    public function assertPropertyType(string $name, $value): void
    {
        parent::assertPropertyType($name, $value);

        if ('required' === $name) {
            foreach ($value as $required) {
                if (false === is_string($required)) {
                    $message = 'Elements of "required" must be of the type "string".';
                    throw new InvalidArgumentException($message);
                }
            }
        }
    }
}
