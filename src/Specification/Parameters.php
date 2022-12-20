<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

final class Parameters extends AbstractSpecification
{
    public function __construct(array $parameters = [])
    {
        foreach ($parameters as $parameter) {
            $this->add($parameter);
        }
    }

    public function add(AbstractSpecification $specification): AbstractSpecification
    {
        if (false === $specification instanceof Parameter && false === $specification instanceof Reference) {
            $message = sprintf(
                'Class "%s" only accepts elements of type "%s" or "%s".',
                get_class($this),
                Parameter::class,
                Reference::class
            );

            throw new InvalidArgumentException($message);
        }

        return parent::add($specification);
    }
}
