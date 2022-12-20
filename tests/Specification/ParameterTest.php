<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Parameter;

final class ParameterTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        $parameter = new Parameter('foo', Parameter::IN_COOKIE);

        return $parameter;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $parameter = new Parameter('foo', Parameter::IN_QUERY);
        $parameter->description = 'Some description';
        $parameter->required = true;
        $parameter->deprecated = false;
        $parameter->allowEmptyValue = false;

        return $parameter;
    }
}
