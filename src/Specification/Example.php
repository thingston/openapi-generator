<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Example object.
 *
 * @link https://swagger.io/specification/#example-object
 */
final class Example extends AbstractSpecification
{
    /**
     * Example constructor.
     *
     * @param string $key
     * @param mixed $value
     * @param string|null $summary
     * @param string|null $description
     * @param Url|null $externalValue
     */
    public function __construct(
        string $key,
        mixed $value,
        ?string $summary = null,
        ?string $description = null,
        ?Url $externalValue = null
    ) {
        $this->key = $key;
        $this->properties['value'] = $value;

        if (null !== $summary) {
            $this->properties['summary'] = $summary;
        }

        if (null !== $description) {
            $this->properties['description'] = $description;
        }

        if (null !== $externalValue) {
            $this->properties['externalValue'] = $externalValue;
        }
    }

    /**
     * Get value.
     *
     * @return mixed
     */
    public function getValue(): mixed
    {
        return $this->properties['value'];
    }

    /**
     * Set value.
     *
     * @param mixed $value
     * @return self
     */
    public function setValue(mixed $value): self
    {
        $this->properties['value'] = $value;

        return $this;
    }

    /**
     * Get summary.
     *
     * @return string|null
     */
    public function getSummary(): ?string
    {
        return $this->properties['summary'] ?? null;
    }

    /**
     * Set summary.
     *
     * @param string|null $summary
     * @return self
     */
    public function setSummary(?string $summary): self
    {
        $this->properties['summary'] = $summary;

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
     * Get externalValue.
     *
     * @return Url|null
     */
    public function getExternalValue(): ?Url
    {
        return $this->properties['externalValue'] ?? null;
    }

    /**
     * Set externalValue.
     *
     * @param Url|null $externalValue
     * @return self
     */
    public function setExternalValue(?Url $externalValue): self
    {
        $this->properties['externalValue'] = $externalValue;

        return $this;
    }

    /**
     * Create Example instance.
     *
     * @param string $key
     * @param mixed $value
     * @param array $options
     * @return self
     */
    public static function create(string $key, mixed $value, array $options = []): self
    {
        if (isset($options['externalValue']) && is_string($options['externalValue'])) {
            $options['externalValue'] = new Url($options['externalValue']);
        }

        $parameters = array_merge($options, [
            'key' => $key,
            'value' => $value,
        ]);

        return new self(...$parameters);
    }
}
