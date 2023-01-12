<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

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
     * @param Response $response
     * @return self
     */
    public function addResponse(Response $response): self
    {
        $this->properties[] = $response;

        return $this;
    }
}
