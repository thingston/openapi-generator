<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

final class RequestBodies extends AbstractSpecification
{
    public function __construct(array $requestBodies = [])
    {
        foreach ($requestBodies as $requestBody) {
            $this->add($requestBody);
        }
    }

    public function assertArrayableType(object $value, string $type = AbstractSpecification::class): void
    {
        parent::assertArrayableType($value, implode('|', [
            RequestBodies::class,
            Reference::class,
        ]));
    }
}
