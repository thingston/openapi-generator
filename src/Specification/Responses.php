<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

/**
 * Collection of response objects.
 */
final class Responses extends AbstractSpecification
{
    /**
     * Responses constructor.
     *
     * @param array $responses
     */
    public function __construct(array $responses = [])
    {
        foreach ($responses as $response) {
            $this->addResponse($response);
        }
    }

    /**
     * Add response.
     *
     * @param Response|Reference $response
     * @return self
     * @throws InvalidArgumentException
     */
    public function addResponse(mixed $response): self
    {
        if (false === $response instanceof Response && false === $response instanceof ResponseReference) {
            throw new InvalidArgumentException('Argument "response" must be of type Response or ResponseReference');
        }

        $this->properties[] = $response;

        return $this;
    }
}
