<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use JsonSerializable;
use Stringable;

final class Enum implements JsonSerializable, Stringable
{
    public function __construct(private array $enum)
    {
        $this->enum = $enum;
    }

    public function __toString(): string
    {
        return json_encode($this, JSON_PRETTY_PRINT);
    }

    public function jsonSerialize(): mixed
    {
        return $this->enum;
    }
}
