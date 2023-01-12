<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Collection of mediaType objects.
 */
final class MediaTypes extends AbstractSpecification
{
    /**
     * MediaTypes constructor.
     *
     * @param array $mediaTypes
     */
    public function __construct(array $mediaTypes = [])
    {
        foreach ($mediaTypes as $mediaType) {
            $this->addMediaType($mediaType);
        }
    }

    /**
     * Add media type.
     *
     * @param MediaType $mediaType
     * @return self
     */
    public function addMediaType(MediaType $mediaType): self
    {
        $this->properties[] = $mediaType;

        return $this;
    }
}
