<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

final class Paths extends AbstractSpecification
{
    public function __construct(array $paths = [])
    {
        foreach ($paths as $path) {
            $this->add($path);
        }
    }

    public function assertArrayableType(object $value, string $type = AbstractSpecification::class): void
    {
        parent::assertArrayableType($value, implode('|', [PathItem::class, Reference::class]));
    }
}
