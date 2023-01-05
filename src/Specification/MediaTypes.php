<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * An array of mediaType objects.
 *
 * @method MediaTypes addMediaType(MediaType $mediaType)
 */
final class MediaTypes extends AbstractSpecification
{
    public function __construct(array $mediaTypes = [])
    {
        foreach ($mediaTypes as $mediaType) {
            $this->addMediaType($mediaType);
        }
    }

    public function assertArrayableType(object $value, string $type = AbstractSpecification::class): void
    {
        parent::assertArrayableType($value, MediaType::class);
    }
}
