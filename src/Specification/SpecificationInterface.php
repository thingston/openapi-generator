<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

interface SpecificationInterface
{
    public function getRequiredProperties(): array;
    public function getOptionalProperties(): array;
    public function getProperties(): array;
    public function isRequiredProperty(string $name): bool;
    public function isOptionalProperty(string $name): bool;
    public function isProperty(string $name): bool;
    public function add(AbstractSpecification $specification): self;
    public function toArray(): array;
}
