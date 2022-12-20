<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

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
            $this->assertSame($type, $specification->getProperties()[$name]);
            $this->assertSame($data[$name], $specification->$name);
        }

        foreach ($specification->getOptionalProperties() as $name => $type) {
            $this->assertArrayNotHasKey($name, $data);
            $this->assertNull($specification->$name);
        }
    }

    public function testFullSpecification(): void
    {
        $specification = $this->createFullSpecification();
        $data = $specification->toArray();

        $this->assertCount(count($data), $specification);

        foreach ($specification->getProperties() as $name => $type) {
            $this->assertArrayHasKey($name, $data);
            $this->assertSame($type, $specification->getProperties()[$name]);
            $this->assertSame($data[$name], $specification->$name);
        }
    }

    public function testStringable(): void
    {
        $specification = $this->createFullSpecification();
        $json = json_encode($specification, JSON_PRETTY_PRINT);

        $this->assertSame($json, (string) $specification);
    }
}
