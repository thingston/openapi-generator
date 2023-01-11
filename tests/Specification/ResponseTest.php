<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\Header;
use Thingston\OpenApi\Specification\Headers;
use Thingston\OpenApi\Specification\MediaType;
use Thingston\OpenApi\Specification\MediaTypes;
use Thingston\OpenApi\Specification\Response;
use Thingston\OpenApi\Test\AbstractTestCase;

final class ResponseTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $response = new Response('Some description');

        $this->assertSame('Some description', $response->getDescription());

        $this->assertNull($response->getHeaders());
        $response->setHeaders($headers = new Headers());
        $this->assertSame($headers, $response->getHeaders());

        $this->assertNull($response->getContent());
        $response->setContent($content = new MediaTypes());
        $this->assertSame($content, $response->getContent());
    }

    public function testFullSpecification(): void
    {
        $response = new Response('Some description', '200', $content = new MediaTypes(), $headers = new Headers());

        $this->assertSame('Some description', $response->getDescription());
        $this->assertSame('200', $response->getKey());
        $this->assertSame($headers, $response->getHeaders());
        $this->assertSame($content, $response->getContent());
    }

    public function testFactory(): void
    {
        $response = Response::create('Some description', [new MediaType()], '200', [
            'headers' => [Header::create('Content-Type')],
        ]);

        $this->assertSame('Some description', $response->getDescription());
        $this->assertSame('200', $response->getKey());
        $this->assertCount(1, $response->getContent());
        $this->assertCount(1, $response->getHeaders());
    }
}
