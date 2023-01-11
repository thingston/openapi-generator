<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\Tag;
use Thingston\OpenApi\Specification\Tags;
use Thingston\OpenApi\Test\AbstractTestCase;

final class TagsTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $tags = new Tags([
            Tag::create('foo'),
        ]);

        $this->assertCount(1, $tags);

        $tags->addTag(Tag::create('bar'));

        $this->assertCount(2, $tags);
    }
}
