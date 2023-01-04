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
    public function __construct(
        string $key,
        ?array $required = null,
        $properties = null,
        ?bool $additionalProperties = null,
        ?int $minProperties = null,
        ?int $maxProperties = null,
        ?string $title = null,
        ?string $description = null,
        ?bool $nullable = null,
        $example = null
    ) {
        $this->assertPropertyNullable('properties', $properties);

        parent::__construct($key, self::TYPE_OBJECT, $title, $description, $nullable, $example);

        if (null !== $required) {
            $this->properties['required'] = $required;
        }

        if (null !== $properties) {
            $this->properties['properties'] = $properties;
        }

        if (null !== $additionalProperties) {
            $this->properties['additionalProperties'] = $additionalProperties;
        }

        if (null !== $minProperties) {
            $this->properties['minProperties'] = $minProperties;
        }

        if (null !== $maxProperties) {
            $this->properties['maxProperties'] = $maxProperties;
        }
    }

    public static function create(
        string $key,
        $properties = null,
        ?array $required = null,
        ?string $title = null,
        array $options = []
    ): self {
        $parameters = array_merge($options, [
            'key' => $key,
            'properties' => $properties,
            'required' => $required,
            'title' => $title,
        ]);

        return new self(...$parameters);
    }

    public function getOptionalProperties(): array
    {
        return array_merge(parent::getOptionalProperties(), [
            'required' => 'array',
            'properties' => implode('|', [Schemas::class, Reference::class]),
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
