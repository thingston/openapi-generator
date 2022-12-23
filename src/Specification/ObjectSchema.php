<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

/**
 * Object schema object.
 *
 * @link https://cswr.github.io/JsonSchema/spec/objects/#object-schemas
 *
 * @method string[]|null getRequired()
 * @method ObjectSchema setRequired(?array $required)
 * @method Schemas|null getProperties()
 * @method ObjectSchema setProperties(?Schemas $properties)
 * @method bool|null getAdditionalProperties()
 * @method ObjectSchema setAdditionalProperties(?bool $additionalProperties)
 * @method int|null getMinProperties()
 * @method ObjectSchema setMinProperties(?int $minProperties)
 * @method int|null getMaxProperties()
 * @method ObjectSchema setMaxProperties(?int $maxProperties)
 */
final class ObjectSchema extends Schema
{
    public function __construct(string $key)
    {
        parent::__construct($key, self::TYPE_OBJECT);
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
