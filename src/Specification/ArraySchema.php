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
    public function __construct(string $key)
    {
        parent::__construct($key, self::TYPE_ARRAY);
    }

    public function getOptionalProperties(): array
    {
        return array_merge(parent::getOptionalProperties(), [
            'items' => Schema::class,
            'additionalItems' => 'boolean',
            'minItems' => 'integer',
            'maxItems' => 'integer',
            'uniqueItems' => 'boolean',
        ]);
    }
}
