<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

final class Examples extends AbstractSpecification
{
    public function __construct(array $examples = [])
    {
        foreach ($examples as $example) {
            $this->add($example);
        }
    }

    public function assertArrayableType(object $value, string $type = AbstractSpecification::class): void
    {
        parent::assertArrayableType($value, implode('|', [Example::class, Reference::class]));
    }
}
