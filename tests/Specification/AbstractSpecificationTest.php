<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;
use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Test\AbstractTestCase;

abstract class AbstractSpecificationTest extends AbstractTestCase
{
    abstract public function createMinimalSpecification(): AbstractSpecification;
    abstract public function createFullSpecification(): AbstractSpecification;

    public function testMinimalSpecification(): void
    {
        $specification = $this->createMinimalSpecification();
        $data = $specification->toArray();

        $this->assertCount(count($data), $specification);

        foreach ($specification->getRequiredProperties() as $name => $type) {
            $this->assertArrayHasKey($name, $data);
            $this->assertSame($type, $specification->getAllProperties()[$name]);
            $method = 'get' . ucfirst($name);
            $this->assertSame($data[$name], $specification->$method());
        }

        foreach ($specification->getOptionalProperties() as $name => $type) {
            $this->assertArrayNotHasKey($name, $data);
            $method = 'get' . ucfirst($name);
            $this->assertNull($specification->$method());
        }
    }

    public function testFullSpecification(): void
    {
        $specification = $this->createFullSpecification();
        $data = $specification->toArray();

        $this->assertCount(count($data), $specification);

        foreach ($specification->getAllProperties() as $name => $type) {
            $this->assertArrayHasKey($name, $data);
            $this->assertSame($type, $specification->getAllProperties()[$name]);
            $method = 'get' . ucfirst($name);
            $this->assertSame($data[$name], $specification->$method());
        }
    }

    public function testStringable(): void
    {
        $specification = $this->createFullSpecification();
        $json = json_encode($specification, JSON_PRETTY_PRINT);

        $this->assertSame($json, (string) $specification);
    }
}
