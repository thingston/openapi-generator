<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

/**
 * Collection of example objects.
 */
final class Examples extends AbstractSpecification
{
    /**
     * Examples constructor.
     *
     * @param array $examples
     */
    public function __construct(array $examples = [])
    {
        foreach ($examples as $example) {
            $this->addExample($example);
        }
    }

    /**
     * Add example.
     *
     * @param Example|ExampleReference $example
     * @return self
     * @throws InvalidArgumentException
     */
    public function addExample(mixed $example): self
    {
        if (false === $example instanceof Example && false === $example instanceof ExampleReference) {
            throw new InvalidArgumentException('Argument "example" must be of type Example or ExampleReference');
        }

        $this->properties[] = $example;

        return $this;
    }
}
