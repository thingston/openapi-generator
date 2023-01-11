<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Describes a single operation parameter.
 *
 * @link https://swagger.io/specification/#parameter-object
 */
final class Parameter extends AbstractSpecification
{
    /**
     * Valid values for "in" property.
     */
    public const IN_PATH = 'path';
    public const IN_QUERY = 'query';
    public const IN_HEADER = 'header';
    public const IN_COOKIE = 'cookie';

    /**
     * Parameter constructor.
     *
     * @param string $name
     * @param string $in
     * @param string|null $description
     * @param bool|null $required
     * @param bool|null $deprecated
     * @param bool|null $allowEmptyValue
     */
    public function __construct(
        string $name,
        string $in,
        ?string $description = null,
        ?bool $required = null,
        ?bool $deprecated = null,
        ?bool $allowEmptyValue = null
    ) {
        $this->properties['name'] = $name;
        $this->properties['in'] = $in;

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
     * Get name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->properties['name'];
    }

    /**
     * Set name.
     *
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->properties['name'] = $name;

        return $this;
    }

    /**
     * Get in.
     *
     * @return string
     */
    public function getIn(): string
    {
        return $this->properties['in'];
    }

    /**
     * Set in.
     *
     * @param string $in
     * @return self
     */
    public function setIn(string $in): self
    {
        $this->properties['in'] = $in;

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
     * Create Parameter instance.
     *
     * @param string $name
     * @param string $in
     * @param array $options
     * @return self
     */
    public static function create(string $name, string $in, array $options = []): self
    {
        $parameters = array_merge($options, [
            'name' => $name,
            'in' => $in,
        ]);

        return new self(...$parameters);
    }
}
