<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * String schema object.
 *
 * @link https://cswr.github.io/JsonSchema/spec/basic_types/#string-schemas
 *
 * @method int|null getMinLength()
 * @method StringSchema setMinLength(?int $minLength)
 * @method int|null getMaxLength()
 * @method StringSchema setMaxLength(?int $maxLength)
 * @method string|null getPattern()
 * @method StringSchema setPattern(?string $pattern)
 */
final class StringSchema extends Schema
{
    public function __construct(string $key)
    {
        parent::__construct($key, self::TYPE_STRING);
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
