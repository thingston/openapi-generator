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
        $example = new Example('name', ['foo' => 'bar']);

        return $example;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $example = new Example('name', ['foo' => 'bar']);
        $example->summary = 'Some summary';
        $example->description = 'Some description';
        $example->externalValue = new Url('http://example.org/example');

        return $example;
    }
}
