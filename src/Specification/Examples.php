<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

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
     * @param Example $example
     * @return self
     */
    public function addExample(Example $example): self
    {
        $this->properties[] = $example;

        return $this;
    }
}
