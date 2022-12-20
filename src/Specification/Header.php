<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Describes a sing HTTP header.
 *
 * @link https://swagger.io/specification/#header-object
 *
 * @property string|null $description
 * @property Schema|Reference|null $schema
 * @property bool|null $required
 * @property bool|null $deprecated
 * @property bool|null $allowEmptyValue
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
