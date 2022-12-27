<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Parameter;

final class ParameterTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new Parameter('foo', Parameter::IN_COOKIE);
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new Parameter('foo', Parameter::IN_COOKIE))
            ->setDescription('Some description')
            ->setRequired(true)
            ->setDeprecated(false)
            ->setAllowEmptyValue(false);
    }
}
