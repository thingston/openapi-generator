<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

final class Examples extends AbstractSpecification
{
    public function __construct(array $examples = [])
    {
        foreach ($examples as $example) {
            $this->add($example);
        }
    }

    public function add(AbstractSpecification $specification): AbstractSpecification
    {
        if (false === $specification instanceof Example && false === $specification instanceof Reference) {
            $message = sprintf(
                'Class "%s" only accepts elements of type "%s" or "%s".',
                get_class($this),
                Example::class,
                Reference::class
            );

            throw new InvalidArgumentException($message);
        }

        return parent::add($specification);
    }

    public function toArray(): array
    {
        $examples = [];

        foreach ($this->properties as $example) {
            $examples[$example->name] = $example;
        }

        return $examples;
    }
}
