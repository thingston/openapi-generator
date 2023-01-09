<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * String schema object.
 *
 * @link https://swagger.io/specification/#schema-object
 * @link https://cswr.github.io/JsonSchema/spec/basic_types/#string-schemas
 */
final class StringSchema extends Schema
{
    /**
     * StringSchema constructor.
     *
     * @param string $key
     * @param int|null $minLength
     * @param int|null $maxLength
     * @param string|null $pattern
     * @param string|null $title
     * @param string|null $description
     * @param bool|null $nullable
     * @param mixed $example
     */
    public function __construct(
        string $key,
        ?int $minLength = null,
        ?int $maxLength = null,
        ?string $pattern = null,
        ?string $title = null,
        ?string $description = null,
        ?bool $nullable = null,
        mixed $example = null
    ) {
        parent::__construct($key, self::TYPE_STRING, $title, $description, $nullable, $example);

        if (null !== $minLength) {
            $this->properties['minLength'] = $minLength;
        }

        if (null !== $maxLength) {
            $this->properties['maxLength'] = $maxLength;
        }

        if (null !== $pattern) {
            $this->properties['pattern'] = $pattern;
        }
    }

    /**
     * Create StringSchema instance.
     *
     * @param string $key
     * @param string|null $title
     * @param array $options
     * @return self
     */
    public static function create(string $key, ?string $title = null, array $options = []): self
    {
        $parameters = array_merge($options, [
            'key' => $key,
            'title' => $title,
        ]);

        return new self(...$parameters);
    }

    /**
     * Get min length.
     *
     * @return int|null
     */
    public function getMinLength(): ?int
    {
        return $this->properties['minLength'] ?? null;
    }

    /**
     * Set min length.
     *
     * @param int|null $minLength
     * @return self
     */
    public function setMinLength(?int $minLength): self
    {
        $this->properties['minLength'] = $minLength;

        return $this;
    }

    /**
     * Get max length.
     *
     * @return int|null
     */
    public function getMaxLength(): ?int
    {
        return $this->properties['maxLength'] ?? null;
    }

    /**
     * Set max length.
     *
     * @param int|null $maxLength
     * @return self
     */
    public function setMaxLength(?int $maxLength): self
    {
        $this->properties['maxLength'] = $maxLength;

        return $this;
    }

    /**
     * Get pattern.
     *
     * @return string|null
     */
    public function getPattern(): ?string
    {
        return $this->properties['pattern'] ?? null;
    }

    /**
     * Set pattern.
     *
     * @param string|null $pattern
     * @return self
     */
    public function setPattern(?string $pattern): self
    {
        $this->properties['pattern'] = $pattern;

        return $this;
    }
}
