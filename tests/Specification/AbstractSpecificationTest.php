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

    public function testFactory(): void
    {
        $specification = $this->createFullSpecification();

        $reflection = new \ReflectionClass(get_class($specification));
        $parameters = $reflection->getConstructor()?->getParameters() ?? [];

        $arguments = [];

        foreach ($parameters as $parameter) {
            if ($specification->isProperty($parameter->name)) {
                $method = 'get' . ucfirst($parameter->name);
                $arguments[$parameter->name] = $specification->$method();
                continue;
            }

            if ($parameter->isDefaultValueAvailable()) {
                $arguments[$parameter->name] = $parameter->getDefaultValue();
                continue;
            }

            if ('key' === $parameter->name) {
                $arguments['key'] = $specification->key;
                continue;
            }

            if ('ref' === $parameter->name) {
                $arguments['ref'] = '#/components/schemasss/Foo';
                continue;
            }

            $message = sprintf(
                'Unable to set value for argument "%s" in "%s::__construct()".',
                $parameter->name,
                get_class($specification)
            );

            throw new InvalidArgumentException($message);
        }

        $this->assertSame(get_class($specification), get_class($specification::create($arguments)));
    }

    public function testStringable(): void
    {
        $specification = $this->createFullSpecification();
        $json = json_encode($specification, JSON_PRETTY_PRINT);

        $this->assertSame($json, (string) $specification);
    }
}
