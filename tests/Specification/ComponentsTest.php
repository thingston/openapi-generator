<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Components;
use Thingston\OpenApi\Specification\Examples;
use Thingston\OpenApi\Specification\Headers;
use Thingston\OpenApi\Specification\IntegerSchema;
use Thingston\OpenApi\Specification\ObjectSchema;
use Thingston\OpenApi\Specification\Parameters;
use Thingston\OpenApi\Specification\RequestBodies;
use Thingston\OpenApi\Specification\Responses;
use Thingston\OpenApi\Specification\Schemas;
use Thingston\OpenApi\Specification\StringSchema;

final class ComponentsTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new Components();
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new Components())
            ->setSchemas(new Schemas())
            ->setResponses(new Responses())
            ->setParameters(new Parameters())
            ->setRequestBodies(new RequestBodies())
            ->setExamples(new Examples())
            ->setHeaders(new Headers());
    }

    public function testFactory(): void
    {
        $components = Components::create([
            'schemas' => [
                ObjectSchema::create('Foo', [
                    IntegerSchema::create('id'),
                    StringSchema::create('name'),
                ]),
            ]
        ]);

        $this->assertCount(1, $components->getSchemas());
    }
}
