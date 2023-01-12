<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

/**
 * Collection of requestBody objects.
 */
final class RequestBodies extends AbstractSpecification
{
    /**
     * RequestBodies constructor.
     *
     * @param array $requestBodies
     */
    public function __construct(array $requestBodies = [])
    {
        foreach ($requestBodies as $requestBody) {
            $this->addRequestBody($requestBody);
        }
    }

    /**
     * Add request body.
     *
     * @param RequestBody|Reference $requestBody
     * @return self
     * @throws InvalidArgumentException
     */
    public function addRequestBody(mixed $requestBody): self
    {
        if (false === $requestBody instanceof RequestBody && false === $requestBody instanceof Reference) {
            throw new InvalidArgumentException('Argument "requestBody" must be of type RequestBody or Reference');
        }

        $this->properties[] = $requestBody;

        return $this;
    }
}
