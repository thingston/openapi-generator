<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\ExternalDocumentation;
use Thingston\OpenApi\Specification\MediaTypes;
use Thingston\OpenApi\Specification\Operation;
use Thingston\OpenApi\Specification\Parameters;
use Thingston\OpenApi\Specification\RequestBody;
use Thingston\OpenApi\Specification\Responses;
use Thingston\OpenApi\Specification\SecurityRequirements;
use Thingston\OpenApi\Specification\Tags;
use Thingston\OpenApi\Test\AbstractTestCase;

final class OperationTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $operation = new Operation($responses = new Responses());

        $this->assertSame($responses, $operation->getResponses());

        $this->assertNull($operation->getSummary());
        $operation->setSummary('Some summary');
        $this->assertSame('Some summary', $operation->getSummary());

        $this->assertNull($operation->getDescription());
        $operation->setDescription('Some description');
        $this->assertSame('Some description', $operation->getDescription());

        $this->assertNull($operation->getExternalDocs());
        $operation->setExternalDocs($externalDocs = ExternalDocumentation::create('http://example.org/docs'));
        $this->assertSame($externalDocs, $operation->getExternalDocs());

        $this->assertNull($operation->getOperationId());
        $operation->setOperationId('Some operationId');
        $this->assertSame('Some operationId', $operation->getOperationId());

        $this->assertNull($operation->getParameters());
        $operation->setParameters($parameters = new Parameters());
        $this->assertSame($parameters, $operation->getParameters());

        $this->assertNull($operation->getRequestBody());
        $operation->setRequestBody($requestBody = new RequestBody(new MediaTypes()));
        $this->assertSame($requestBody, $operation->getRequestBody());

        $this->assertNull($operation->getTags());
        $operation->setTags($tags = new Tags());
        $this->assertSame($tags, $operation->getTags());

        $this->assertNull($operation->getSecurity());
        $operation->setSecurity($security = new SecurityRequirements());
        $this->assertSame($security, $operation->getSecurity());
    }

    public function testFullSpecification(): void
    {
        $operation = new Operation(
            $responses = new Responses(),
            'Some summary',
            'Some description',
            $externalDocs = ExternalDocumentation::create('http://example.org/docs'),
            'Some operationId',
            $parameters = new Parameters(),
            $requestBody = new RequestBody(new MediaTypes()),
            $tags = new Tags(),
            $security = new SecurityRequirements()
        );

        $this->assertSame($responses, $operation->getResponses());
        $this->assertSame('Some summary', $operation->getSummary());
        $this->assertSame('Some description', $operation->getDescription());
        $this->assertSame($externalDocs, $operation->getExternalDocs());
        $this->assertSame('Some operationId', $operation->getOperationId());
        $this->assertSame($parameters, $operation->getParameters());
        $this->assertSame($requestBody, $operation->getRequestBody());
        $this->assertSame($tags, $operation->getTags());
        $this->assertSame($security, $operation->getSecurity());
    }
}
