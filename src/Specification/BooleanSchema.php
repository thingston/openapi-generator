<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

final class BooleanSchema extends Schema
{
    public function __construct(public string $name)
    {
        parent::__construct($name, self::TYPE_BOOLEAN);
    }
}
