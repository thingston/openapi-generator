<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

final class Responses extends AbstractSpecification
{
    public function __construct(array $responses = [])
    {
        foreach ($responses as $response) {
            $this->add($response);
        }
    }

    public function assertArrayableType(object $value, string $type = AbstractSpecification::class): void
    {
        parent::assertArrayableType($value, implode('|', [
            Responses::class,
            Reference::class,
        ]));
    }
}
