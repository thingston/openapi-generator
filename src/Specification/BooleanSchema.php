<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Boolean schema object.
 *
 * @link https://cswr.github.io/JsonSchema/spec/basic_types/#boolean-schemas
 */
final class BooleanSchema extends Schema
{
    public function __construct(string $key)
    {
        parent::__construct($key, self::TYPE_BOOLEAN);
    }
}
