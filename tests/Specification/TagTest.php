<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\ExternalDocumentation;
use Thingston\OpenApi\Specification\Tag;
use Thingston\OpenApi\Specification\Url;

final class TagTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new Tag('name');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new Tag('name'))
            ->setDescription('Some description')
            ->setExternalDocs(new ExternalDocumentation(new Url('http://example.org/docs')));
    }
}
