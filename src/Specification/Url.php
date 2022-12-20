<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use JsonSerializable;
use Stringable;
use Thingston\OpenApi\Exception\InvalidArgumentException;

final class Url implements JsonSerializable, Stringable
{
    public function __construct(private string $url)
    {
        if (false === filter_var($url, FILTER_VALIDATE_URL)) {
            $message = sprintf('The values "%s" isn\'t a valid URL.', $url);
            throw new InvalidArgumentException($message);
        }

        $this->url = $url;
    }

    public function __toString(): string
    {
        return $this->url;
    }

    public function jsonSerialize(): mixed
    {
        return $this->url;
    }
}
