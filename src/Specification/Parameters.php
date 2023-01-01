<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * An array of parameter objects.
 *
 * @method Parameters addParameter(Parameter $parameter)
 */
final class Parameters extends AbstractSpecification
{
    public function __construct(array $parameters = [])
    {
        foreach ($parameters as $parameter) {
            $this->addParameter($parameter);
        }
    }

    public function assertArrayableType(object $value, string $type = AbstractSpecification::class): void
    {
        parent::assertArrayableType($value, implode('|', [Parameter::class, Reference::class]));
    }
}
