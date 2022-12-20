<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * @property Schema|null $items
 * @property bool|null $additionalItems
 * @property int|null $minItems
 * @property int|null $maxItems
 * @property bool|null $uniqueItems
 */
final class ArraySchema extends Schema
{
    public function __construct(public string $name)
    {
        parent::__construct($name, self::TYPE_ARRAY);
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
