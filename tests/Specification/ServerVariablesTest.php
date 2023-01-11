<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\ServerVariable;
use Thingston\OpenApi\Specification\ServerVariables;
use Thingston\OpenApi\Test\AbstractTestCase;

final class ServerVariablesTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $variables = new ServerVariables([
            new ServerVariable('foo'),
        ]);

        $this->assertCount(1, $variables);

        $variables->addServerVariable(new ServerVariable('bar'));

        $this->assertCount(2, $variables);
    }
}
