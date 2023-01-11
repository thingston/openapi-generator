<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\Example;
use Thingston\OpenApi\Specification\Url;
use Thingston\OpenApi\Test\AbstractTestCase;

final class ExampleTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $example = new Example('name', ['foo' => 'bar']);

        $this->assertSame('name', $example->getKey());
        $this->assertSame(['foo' => 'bar'], $example->getValue());

        $this->assertNull($example->getSummary());
        $example->setSummary('Some summary');
        $this->assertSame('Some summary', $example->getSummary());

        $this->assertNull($example->getDescription());
        $example->setDescription('Some description');
        $this->assertSame('Some description', $example->getDescription());

        $this->assertNull($example->getExternalValue());
        $example->setExternalValue($url = new Url('http://example.org/example'));
        $this->assertSame($url, $example->getExternalValue());
    }

    public function testFullSpecification(): void
    {
        $example = new Example(
            'name',
            ['foo' => 'bar'],
            'Some summary',
            'Some description',
            $url = new Url('http://example.org/example')
        );

        $this->assertSame('name', $example->getKey());
        $this->assertSame(['foo' => 'bar'], $example->getValue());
        $this->assertSame('Some summary', $example->getSummary());
        $this->assertSame('Some description', $example->getDescription());
        $this->assertSame($url, $example->getExternalValue());
    }

    public function testFactory(): void
    {
        $example = Example::create('foo', 'Some value', [
            'externalValue' => 'http://example.org/example',
        ]);

        $this->assertSame('foo', $example->getKey());
        $this->assertSame('Some value', $example->getValue());
        $this->assertNull($example->getSummary());
        $this->assertNull($example->getDescription());
        $this->assertSame('http://example.org/example', (string) $example->getExternalValue());
    }
}
