<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Object schema object.
 *
 * @link https://swagger.io/specification/#schema-object
 * @link https://cswr.github.io/JsonSchema/spec/objects/#object-schemas
 */
final class ObjectSchema extends Schema
{
    /**
     * ObjectSchema constructor.
     *
     * @param string $key
     * @param array|null $required
     * @param Schemas|null $properties
     * @param bool|null $additionalProperties
     * @param int|null $minProperties
     * @param int|null $maxProperties
     * @param string|null $title
     * @param string|null $description
     * @param bool|null $nullable
     * @param mixed $example
     */
    public function __construct(
        string $key,
        ?array $required = null,
        ?Schemas $properties = null,
        ?bool $additionalProperties = null,
        ?int $minProperties = null,
        ?int $maxProperties = null,
        ?string $title = null,
        ?string $description = null,
        ?bool $nullable = null,
        mixed $example = null
    ) {
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

    /**
     * Get required.
     *
     * @return array|null
     */
    public function getRequired(): ?array
    {
        return $this->properties['required'] ?? null;
    }

    /**
     * Set required.
     *
     * @param array|null $required
     * @return self
     */
    public function setRequired(?array $required): self
    {
        $this->properties['required'] = $required;

        return $this;
    }

    /**
     * Get properties.
     *
     * @return Schemas|null
     */
    public function getProperties(): ?Schemas
    {
        return $this->properties['properties'] ?? null;
    }

    /**
     * Set properties.
     *
     * @param Schemas|null $properties
     * @return self
     */
    public function setProperties(?Schemas $properties): self
    {
        $this->properties['properties'] = $properties;

        return $this;
    }

    /**
     * Get additional properties.
     *
     * @return bool|null
     */
    public function getAdditionalProperties(): ?bool
    {
        return $this->properties['additionalProperties'] ?? null;
    }

    /**
     * Set additional properties.
     *
     * @param bool|null $additionalProperties
     * @return self
     */
    public function setAdditionalProperties(?bool $additionalProperties): self
    {
        $this->properties['additionalProperties'] = $additionalProperties;

        return $this;
    }

    /**
     * Get min properties.
     *
     * @return int|null
     */
    public function getMinProperties(): ?int
    {
        return $this->properties['minProperties'] ?? null;
    }

    /**
     * Set min properties.
     *
     * @param int|null $minProperties
     * @return self
     */
    public function setMinProperties(?int $minProperties): self
    {
        $this->properties['minProperties'] = $minProperties;

        return $this;
    }

    /**
     * Get max properties.
     *
     * @return int|null
     */
    public function getMaxProperties(): ?int
    {
        return $this->properties['maxProperties'] ?? null;
    }

    /**
     * Set max properties.
     *
     * @param int|null $maxProperties
     * @return self
     */
    public function setMaxProperties(?int $maxProperties): self
    {
        $this->properties['maxProperties'] = $maxProperties;

        return $this;
    }

    /**
     * Create ObjectSchema instance.
     *
     * @param string $key
     * @param Schemas|array<Schema>|array<Reference>|null $properties
     * @param array|null $required
     * @param string|null $title
     * @param array $options
     * @return self
     */
    public static function create(
        string $key,
        mixed $properties = null,
        ?array $required = null,
        ?string $title = null,
        array $options = []
    ): self {
        if (is_array($properties)) {
            $properties = new Schemas($properties);
        }

        $parameters = array_merge($options, [
            'key' => $key,
            'properties' => $properties,
            'required' => $required,
            'title' => $title,
        ]);

        return new self(...$parameters);
    }
}
