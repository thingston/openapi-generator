<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * An array of response objects.
 *
 * @method Responses addResponse(Response|Reference $response)
     */
final class Responses extends AbstractSpecification
{
    public function __construct(array $responses = [])
    {
        foreach ($responses as $response) {
            $this->addResponse($response);
        }
    }

    public function assertArrayableType(object $value, string $type = AbstractSpecification::class): void
    {
        parent::assertArrayableType($value, implode('|', [
            Response::class,
            Reference::class,
        ]));
    }
}
