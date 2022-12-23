<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Null object schema.
 *
 * @link https://cswr.github.io/JsonSchema/spec/basic_types/#null-schemas
 */
final class NullSchema extends Schema
{
    public function __construct(string $key)
    {
        parent::__construct($key, self::TYPE_NULL);
    }
}
