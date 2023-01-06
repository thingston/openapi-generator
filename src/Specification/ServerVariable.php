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
    public function __construct(
        string $default,
        ?string $description = null,
        ?Enum $enum = null,
    ) {
        $this->properties['default'] = $default;

        if (null !== $description) {
            $this->properties['description'] = $description;
        }

        if (null !== $enum) {
            $this->properties['enum'] = $enum;
        }
    }

    public static function create(string $default, ?array $enum = null, array $options = []): self
    {
        if (is_array($enum)) {
            $enum = new Enum($enum);
        }

        $parameters = array_merge($options, [
            'default' => $default,
            'enum' => $enum,
        ]);

        return new self(...$parameters);
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
