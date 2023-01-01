<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Tag;
use Thingston\OpenApi\Specification\Tags;

final class TagsTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new Tags();
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return $tags = new Tags([
            new Tag('foo'),
            new Tag('bar'),
        ]);
    }
}
