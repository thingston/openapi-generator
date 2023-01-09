<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

/**
 * Array schema object.
 *
 * @link https://swagger.io/specification/#schema-object
 * @link https://cswr.github.io/JsonSchema/spec/arrays/#array-schemas
 */
final class ArraySchema extends Schema
{
    /**
     * ArraySchema constructor.
     *
     * @param string $key
     * @param Schema|Reference|null $items
     * @param bool|null $additionalItems
     * @param int|null $minItems
     * @param int|null $maxItems
     * @param bool|null $uniqueItems
     * @param string|null $title
     * @param string|null $description
     * @param bool|null $nullable
     * @param mixed $example
     */
    public function __construct(
        string $key,
        mixed $items = null,
        ?bool $additionalItems = null,
        ?int $minItems = null,
        ?int $maxItems = null,
        ?bool $uniqueItems = null,
        ?string $title = null,
        ?string $description = null,
        ?bool $nullable = null,
        mixed $example = null
    ) {
        parent::__construct($key, self::TYPE_ARRAY, $title, $description, $nullable, $example);

        if (false === $items instanceof Schema && false === $items instanceof Reference && false === is_null($items)) {
            throw new InvalidArgumentException('Argument "items" must be of type Schema, Reference or null.');
        }

        if (null !== $items) {
            $this->properties['items'] = $items;
        }

        if (null !== $additionalItems) {
            $this->properties['additionalItems'] = $additionalItems;
        }

        if (null !== $minItems) {
            $this->properties['minItems'] = $minItems;
        }

        if (null !== $maxItems) {
            $this->properties['maxItems'] = $maxItems;
        }

        if (null !== $uniqueItems) {
            $this->properties['uniqueItems'] = $uniqueItems;
        }
    }

    /**
     * Get items.
     *
     * @return Schema|Reference|null
     */
    public function getItems(): mixed
    {
        return $this->properties['items'] ?? null;
    }

    /**
     * Set items.
     *
     * @param Schema|Reference|null $items
     * @return self
     * @throws InvalidArgumentException
     */
    public function setItems(mixed $items): self
    {
        if (false === $items instanceof Schema && false === $items instanceof Reference && false === is_null($items)) {
            throw new InvalidArgumentException('Argument "items" must be of type Schema, Reference or null.');
        }

        $this->properties['items'] = $items;

        return $this;
    }

    /**
     * Get additional items.
     *
     * @return bool|null
     */
    public function getAdditionalItems(): ?bool
    {
        return $this->properties['additionalItems'] ?? null;
    }

    /**
     * Set additional items.
     *
     * @param bool|null $additionalItems
     * @return self
     */
    public function setAdditionalItems(?bool $additionalItems): self
    {
        $this->properties['additionalItems'] = $additionalItems;

        return $this;
    }

    /**
     * Get min items.
     *
     * @return int|null
     */
    public function getMinItems(): ?int
    {
        return $this->properties['minItems'] ?? null;
    }

    /**
     * Set min items.
     *
     * @param int|null $minItems
     * @return self
     */
    public function setMinItems(?int $minItems): self
    {
        $this->properties['minItems'] = $minItems;

        return $this;
    }

    /**
     * Get max items.
     *
     * @return int|null
     */
    public function getMaxItems(): ?int
    {
        return $this->properties['maxItems'] ?? null;
    }

    /**
     * Set max items.
     *
     * @param int|null $maxItems
     * @return self
     */
    public function setMaxItems(?int $maxItems): self
    {
        $this->properties['maxItems'] = $maxItems;

        return $this;
    }

    /**
     * Get unique items.
     *
     * @return bool|null
     */
    public function getUniqueItems(): ?bool
    {
        return $this->properties['uniqueItems'] ?? null;
    }

    /**
     * Set unique items.
     *
     * @param bool|null $uniqueItems
     * @return self
     */
    public function setUniqueItems(?bool $uniqueItems): self
    {
        $this->properties['uniqueItems'] = $uniqueItems;

        return $this;
    }

    /**
     * Create ArraySchema instance.
     *
     * @param string $key
     * @param Schema|Reference|null $items
     * @param string|null $title
     * @param array $options
     * @return self
     */
    public static function create(string $key, mixed $items = null, ?string $title = null, array $options = []): self
    {
        $parameters = array_merge($options, [
            'key' => $key,
            'items' => $items,
            'title' => $title,
        ]);

        return new self(...$parameters);
    }
}
