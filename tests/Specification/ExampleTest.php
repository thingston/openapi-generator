<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Example;
use Thingston\OpenApi\Specification\Url;

final class ExampleTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new Example('name', ['foo' => 'bar']);
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new Example('name', ['foo' => 'bar']))
            ->setSummary('Some summary')
            ->setDescription('Some description')
            ->setExternalValue(new Url('http://example.org/example'));
    }
}
