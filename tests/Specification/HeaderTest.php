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
        return new Header('Content-Type');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new Header('Content-Type'))
            ->setSchema(new StringSchema('Content-Type'))
            ->setDescription('Some description')
            ->setRequired(true)
            ->setDeprecated(false)
            ->setAllowEmptyValue(false);
    }
}
