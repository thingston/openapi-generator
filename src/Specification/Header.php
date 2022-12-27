<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Describes a sing HTTP header.
 *
 * @link https://swagger.io/specification/#header-object
 *
 * @method string|null getDescription()
 * @method Header setDescription(?string $description)
 * @method Schema|Reference|null getSchema()
 * @method Header setSchema(Schema|Reference|null $schema)
 * @method bool|null getRequired()
 * @method Header setRequired(?bool $required)
 * @method bool|null getDeprecated()
 * @method Header setDeprecated(?bool $deprecated)
 * @method bool|null getAllowEmptyValue()
 * @method Header setAllowEmptyValue(?bool $allowEmptyValue)
 */
final class Header extends AbstractSpecification
{
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function getOptionalProperties(): array
    {
        return [
            'description' => 'string',
            'schema' => implode('|', [Schema::class, Reference::class]),
            'required' => 'boolean',
            'deprecated' => 'boolean',
            'allowEmptyValue' => 'boolean',
        ];
    }
}
