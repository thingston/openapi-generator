<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * An object representing a Server Variable for server URL template substitution.
 *
 * @link https://swagger.io/specification/#server-variable-object
 *
 * @method string getDefault()
 * @method ServerVariable setDefault(string $default)
 * @method string|null getDescription()
 * @method ServerVariable setDescription(?string $description)
 * @method Enum|null getEnum()
 * @method ServerVariable setEnum(?Enum $enum)
 */
final class ServerVariable extends AbstractSpecification
{
    public function __construct(string $default)
    {
        $this->properties['default'] = $default;
    }

    public function getRequiredProperties(): array
    {
        return [
            'default' => 'string',
        ];
    }

    public function getOptionalProperties(): array
    {
        return [
            'description' => 'string',
            'enum' => Enum::class,
        ];
    }
}
