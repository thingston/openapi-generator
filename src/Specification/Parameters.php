<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Collection of parameter objects.
 */
final class Parameters extends AbstractSpecification
{
    /**
     * Parameters constructor.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters = [])
    {
        foreach ($parameters as $parameter) {
            $this->addParameter($parameter);
        }
    }

    /**
     * Add parameter.
     *
     * @param Parameter $parameter
     * @return self
     */
    public function addParameter(Parameter $parameter): self
    {
        $this->properties[] = $parameter;

        return $this;
    }
}
