<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use JsonSerializable;
use Stringable;
use Thingston\OpenApi\Exception\InvalidArgumentException;

final class Email implements JsonSerializable, Stringable
{
    public function __construct(private string $email)
    {
        if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = sprintf('The values "%s" isn\'t a valid email address.', $email);
            throw new InvalidArgumentException($message);
        }

        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }

    public function jsonSerialize(): mixed
    {
        return $this->email;
    }
}
