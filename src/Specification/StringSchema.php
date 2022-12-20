<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * @property int|null $minLength
 * @property int|null $maxLength
 * @property string|null $pattern
 */
final class StringSchema extends Schema
{
    public function __construct(public string $name)
    {
        parent::__construct($name, self::TYPE_STRING);
    }

    public function getOptionalProperties(): array
    {
        return array_merge(parent::getOptionalProperties(), [
            'minLength' => 'integer',
            'maxLength' => 'integer',
            'pattern' => 'string',
        ]);
    }
}
