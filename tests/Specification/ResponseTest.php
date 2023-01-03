<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Headers;
use Thingston\OpenApi\Specification\MediaTypes;
use Thingston\OpenApi\Specification\Response;

final class ResponseTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new Response('Some description');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new Response('Some description'))
            ->setHeaders(new Headers())
            ->setContent(new MediaTypes());
    }
}
