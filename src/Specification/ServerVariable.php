<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * An object representing a Server Variable for server URL template substitution.
 *
 * @link https://swagger.io/specification/#server-variable-object
 */
final class ServerVariable extends AbstractSpecification
{
    /**
     * ServerVariable constructor.
     *
     * @param string $default
     * @param string|null $description
     * @param Enum|null $enum
     */
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

    /**
     * Get default.
     *
     * @return string
     */
    public function getDefault(): string
    {
        return $this->properties['default'];
    }

    /**
     * Set default.
     *
     * @param string $default
     * @return self
     */
    public function setDefault(string $default): self
    {
        $this->properties['default'] = $default;

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
     * Get enum.
     *
     * @return Enum|null
     */
    public function getEnum(): ?Enum
    {
        return $this->properties['enum'] ?? null;
    }

    /**
     * Set default.
     *
     * @param Enum|null $enum
     * @return self
     */
    public function setEnum(?Enum $enum): self
    {
        $this->properties['enum'] = $enum;

        return $this;
    }

    /**
     * Create ServerVariable instance.
     *
     * @param string $default
     * @param array|null $enum
     * @param array $options
     * @return self
     */
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
}
