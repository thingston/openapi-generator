<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\Operation;
use Thingston\OpenApi\Specification\Parameters;
use Thingston\OpenApi\Specification\PathItem;
use Thingston\OpenApi\Specification\Servers;
use Thingston\OpenApi\Test\AbstractTestCase;

final class PathItemTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $path = new PathItem('foo');

        $this->assertSame('/foo', $path->getKey());

        $this->assertNull($path->getSummary());
        $path->setSummary('Some summary');
        $this->assertSame('Some summary', $path->getSummary());

        $this->assertNull($path->getDescription());
        $path->setDescription('Some description');
        $this->assertSame('Some description', $path->getDescription());

        $this->assertNull($path->getGet());
        $path->setGet($get = Operation::create([]));
        $this->assertSame($get, $path->getGet());

        $this->assertNull($path->getPost());
        $path->setPost($post = Operation::create([]));
        $this->assertSame($post, $path->getPost());

        $this->assertNull($path->getPut());
        $path->setPut($put = Operation::create([]));
        $this->assertSame($put, $path->getPut());

        $this->assertNull($path->getPatch());
        $path->setPatch($patch = Operation::create([]));
        $this->assertSame($patch, $path->getPatch());

        $this->assertNull($path->getDelete());
        $path->setDelete($delete = Operation::create([]));
        $this->assertSame($delete, $path->getDelete());

        $this->assertNull($path->getHead());
        $path->setHead($head = Operation::create([]));
        $this->assertSame($head, $path->getHead());

        $this->assertNull($path->getOptions());
        $path->setOptions($options = Operation::create([]));
        $this->assertSame($options, $path->getOptions());

        $this->assertNull($path->getTrace());
        $path->setTrace($trace = Operation::create([]));
        $this->assertSame($trace, $path->getTrace());

        $this->assertNull($path->getServers());
        $path->setServers($servers = new Servers());
        $this->assertSame($servers, $path->getServers());

        $this->assertNull($path->getParameters());
        $path->setParameters($parameters = new Parameters());
        $this->assertSame($parameters, $path->getParameters());
    }

    public function testFullSpecification(): void
    {
        $path = new PathItem(
            'foo',
            'Some summary',
            'Some description',
            $get = Operation::create([]),
            $post = Operation::create([]),
            $put = Operation::create([]),
            $patch = Operation::create([]),
            $delete = Operation::create([]),
            $options = Operation::create([]),
            $head = Operation::create([]),
            $trace = Operation::create([]),
            $servers = new Servers(),
            $parameters = new Parameters()
        );

        $this->assertSame('/foo', $path->getKey());
        $this->assertSame('Some summary', $path->getSummary());
        $this->assertSame('Some description', $path->getDescription());
        $this->assertSame($get, $path->getGet());
        $this->assertSame($post, $path->getPost());
        $this->assertSame($put, $path->getPut());
        $this->assertSame($patch, $path->getPatch());
        $this->assertSame($delete, $path->getDelete());
        $this->assertSame($head, $path->getHead());
        $this->assertSame($options, $path->getOptions());
        $this->assertSame($trace, $path->getTrace());
        $this->assertSame($servers, $path->getServers());
        $this->assertSame($parameters, $path->getParameters());
    }

    public function testFactory(): void
    {
        $path = PathItem::create('foo', [
            'servers' => [],
            'parameters' => [],
        ]);

        $this->assertSame('/foo', $path->getKey());
        $this->assertInstanceOf(Servers::class, $path->getServers());
        $this->assertInstanceOf(Parameters::class, $path->getParameters());
    }
}
