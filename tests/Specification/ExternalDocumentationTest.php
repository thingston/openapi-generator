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
        $externalDocs = new ExternalDocumentation(new Url('http://example.org/docs'));

        return $externalDocs;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $externalDocs = new ExternalDocumentation(new Url('http://example.org/docs'));
        $externalDocs->description = 'Some description';

        return $externalDocs;
    }
}
