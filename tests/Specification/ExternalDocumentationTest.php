<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\ExternalDocumentation;
use Thingston\OpenApi\Specification\Url;

final class ExternalDocumentationTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new ExternalDocumentation(new Url('http://example.org/docs'));
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new ExternalDocumentation(new Url('http://example.org/docs')))
            ->setDescription('Some description');
    }
}
