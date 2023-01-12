<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

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
     * @param MediaType|Reference $mediaType
     * @return self
     * @throws InvalidArgumentException
     */
    public function addMediaType(mixed $mediaType): self
    {
        if (false === $mediaType instanceof MediaType && false === $mediaType instanceof Reference) {
            throw new InvalidArgumentException('Argument "mediaType" must be of type MediaType or Reference');
        }

        $this->properties[] = $mediaType;

        return $this;
    }
}
