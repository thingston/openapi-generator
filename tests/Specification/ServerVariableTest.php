<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Enum;
use Thingston\OpenApi\Specification\ServerVariable;

final class ServerVariableTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new ServerVariable('foo');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new ServerVariable('foo'))
            ->setDescription('Some description')
            ->setEnum(new Enum(['foo', 'bar', 'baz']));
    }
}
