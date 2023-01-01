<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * An array of requestBody objects.
 *
 * @method RequestBodies addRequestBody(RequestBody $requestBody)
 */
final class RequestBodies extends AbstractSpecification
{
    public function __construct(array $requestBodies = [])
    {
        foreach ($requestBodies as $requestBody) {
            $this->addRequestBody($requestBody);
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
