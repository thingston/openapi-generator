<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

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
     * @param Parameter|Reference $parameter
     * @return self
     * @throws InvalidArgumentException
     */
    public function addParameter(mixed $parameter): self
    {
        if (false === $parameter instanceof Parameter && false === $parameter instanceof Reference) {
            throw new InvalidArgumentException('Argument "parameter" must be of type Parameter or Reference');
        }

        $this->properties[] = $parameter;

        return $this;
    }
}
