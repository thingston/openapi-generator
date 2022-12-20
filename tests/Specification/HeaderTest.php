<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Header;
use Thingston\OpenApi\Specification\StringSchema;

final class HeaderTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        $header = new Header('Content-Type');

        return $header;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $header = new Header('Content-Type');
        $header->description = 'Some description';
        $header->schema = new StringSchema($header->key);
        $header->required = true;
        $header->deprecated = false;
        $header->allowEmptyValue = false;

        return $header;
    }
}
