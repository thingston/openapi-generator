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
    /**
     * Header constructor.
     *
     * @param string $key
     * @param string|null $description
     * @param bool|null $required
     * @param bool|null $deprecated
     * @param bool|null $allowEmptyValue
     */
    public function __construct(
        string $key,
        ?string $description = null,
        ?bool $required = null,
        ?bool $deprecated = null,
        ?bool $allowEmptyValue = null
    ) {
        $this->key = $key;

        if (null !== $description) {
            $this->properties['description'] = $description;
        }

        if (null !== $required) {
            $this->properties['required'] = $required;
        }

        if (null !== $deprecated) {
            $this->properties['deprecated'] = $deprecated;
        }

        if (null !== $allowEmptyValue) {
            $this->properties['allowEmptyValue'] = $allowEmptyValue;
        }
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
     * Get required.
     *
     * @return bool|null
     */
    public function getRequired(): ?bool
    {
        return $this->properties['required'] ?? null;
    }

    /**
     * Set required.
     *
     * @param bool|null $required
     * @return self
     */
    public function setRequired(?bool $required): self
    {
        $this->properties['required'] = $required;

        return $this;
    }

    /**
     * Get deprecated.
     *
     * @return bool|null
     */
    public function getDeprecated(): ?bool
    {
        return $this->properties['deprecated'] ?? null;
    }

    /**
     * Set deprecated.
     *
     * @param bool|null $deprecated
     * @return self
     */
    public function setDeprecated(?bool $deprecated): self
    {
        $this->properties['deprecated'] = $deprecated;

        return $this;
    }

    /**
     * Get allow empty value.
     *
     * @return bool|null
     */
    public function getAllowEmptyValue(): ?bool
    {
        return $this->properties['allowEmptyValue'] ?? null;
    }

    /**
     * Set allow empty value.
     *
     * @param bool|null $allowEmptyValue
     * @return self
     */
    public function setAllowEmptyValue(?bool $allowEmptyValue): self
    {
        $this->properties['allowEmptyValue'] = $allowEmptyValue;

        return $this;
    }

    /**
     * Create Header instance.
     *
     * @param string $key
     * @param array $options
     * @return self
     */
    public static function create(string $key, array $options = []): self
    {
        $parameters = array_merge($options, [
            'key' => $key,
        ]);

        return new self(...$parameters);
    }
}
