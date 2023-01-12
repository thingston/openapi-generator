<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

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
     * @param RequestBody $requestBody
     * @return self
     */
    public function addRequestBody(RequestBody $requestBody): self
    {
        $this->properties[] = $requestBody;

        return $this;
    }
}
