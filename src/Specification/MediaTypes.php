<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

final class MediaTypes extends AbstractSpecification
{
    public function __construct(array $mediaTypes = [])
    {
        foreach ($mediaTypes as $mediaType) {
            $this->add($mediaType);
        }
    }

    public function assertArrayableType(object $value, string $type = AbstractSpecification::class): void
    {
        parent::assertArrayableType($value, MediaTypes::class);
    }
}
