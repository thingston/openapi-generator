<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

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
use Thingston\OpenApi\Test\AbstractTestCase;

final class ComponentsTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $components = new Components();

        $this->assertNull($components->getSchemas());
        $components->setSchemas($schemas = new Schemas());
        $this->assertSame($schemas, $components->getSchemas());

        $this->assertNull($components->getResponses());
        $components->setResponses($responses = new Responses());
        $this->assertSame($responses, $components->getResponses());

        $this->assertNull($components->getParameters());
        $components->setParameters($parameters = new Parameters());
        $this->assertSame($parameters, $components->getParameters());

        $this->assertNull($components->getExamples());
        $components->setExamples($examples = new Examples());
        $this->assertSame($examples, $components->getExamples());

        $this->assertNull($components->getRequestBodies());
        $components->setRequestBodies($requestBodies = new RequestBodies());
        $this->assertSame($requestBodies, $components->getRequestBodies());

        $this->assertNull($components->getHeaders());
        $components->setHeaders($headers = new Headers());
        $this->assertSame($headers, $components->getHeaders());
    }

    public function testFullSpecification(): void
    {
        $components = new Components(
            $schemas = new Schemas(),
            $responses = new Responses(),
            $parameters = new Parameters(),
            $examples = new Examples(),
            $requestBodies = new RequestBodies(),
            $headers = new Headers()
        );

        $this->assertSame($schemas, $components->getSchemas());
        $this->assertSame($responses, $components->getResponses());
        $this->assertSame($parameters, $components->getParameters());
        $this->assertSame($examples, $components->getExamples());
        $this->assertSame($requestBodies, $components->getRequestBodies());
        $this->assertSame($headers, $components->getHeaders());
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
