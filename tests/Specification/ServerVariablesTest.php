<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\ServerVariable;
use Thingston\OpenApi\Specification\ServerVariables;

final class ServerVariablesTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new ServerVariables();
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return new ServerVariables([
            new ServerVariable('foo'),
            new ServerVariable('bar'),
            new ServerVariable('baz'),
        ]);
    }
}
