<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * An array of tag objects.
 *
 * @method Tags addTag(Tag $tag)
 */
final class Tags extends AbstractSpecification
{
    public function __construct(array $tags = [])
    {
        foreach ($tags as $tag) {
            $this->addTag($tag);
        }
    }

    public function assertArrayableType(object $value, string $type = AbstractSpecification::class): void
    {
        parent::assertArrayableType($value, Tag::class);
    }
}
