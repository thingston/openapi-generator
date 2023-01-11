<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Collection of tag objects.
 */
final class Tags extends AbstractSpecification
{
    /**
     * Tags constructor.
     *
     * @param array<Tag> $tags
     */
    public function __construct(array $tags = [])
    {
        foreach ($tags as $tag) {
            $this->addTag($tag);
        }
    }

    /**
     * Add tag.
     *
     * @param Tag $tag
     * @return self
     */
    public function addTag(Tag $tag): self
    {
        $this->properties[] = $tag;

        return $this;
    }
}
