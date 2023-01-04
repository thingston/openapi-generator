<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Array schema object.
 *
 * @link https://cswr.github.io/JsonSchema/spec/arrays/#array-schemas
 *
 * @method Schema|null getItems()
 * @method ArraySchema setItems(?Schema $items)
 * @method bool|null getAdditionalItems()
 * @method ArraySchema setAdditionalItems(?bool $additionalItems)
 * @method int|null getMinItems()
 * @method ArraySchema setMinItems(?int $minItems)
 * @method int|null getMaxItems()
 * @method ArraySchema setMaxItems(?int $maxItems)
 * @method bool|null getUniqueItems()
 * @method ArraySchema setUniqueItems(?bool $uniqueItems)
 */
final class ArraySchema extends Schema
{
    public function __construct(
        string $key,
        $items = null,
        ?bool $additionalItems = null,
        ?int $minItems = null,
        ?int $maxItems = null,
        ?bool $uniqueItems = null,
        ?string $title = null,
        ?string $description = null,
        ?bool $nullable = null,
        $example = null
    ) {
        $this->assertPropertyType('items', $items);

        parent::__construct($key, self::TYPE_ARRAY, $title, $description, $nullable, $example);

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

    public static function create(string $key, $items = null, ?string $title = null, array $options = []): self
    {
        $parameters = array_merge($options, [
            'key' => $key,
            'items' => $items,
            'title' => $title,
        ]);

        return new self(...$parameters);
    }

    public function getOptionalProperties(): array
    {
        return array_merge(parent::getOptionalProperties(), [
            'items' => implode('|', [Schema::class, Reference::class]),
            'additionalItems' => 'boolean',
            'minItems' => 'integer',
            'maxItems' => 'integer',
            'uniqueItems' => 'boolean',
        ]);
    }
}
