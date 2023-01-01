<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

interface SpecificationInterface
{
    public function getRequiredProperties(): array;
    public function getOptionalProperties(): array;
    public function getAllProperties(): array;
    public function isRequiredProperty(string $name): bool;
    public function isOptionalProperty(string $name): bool;
    public function isProperty(string $name): bool;
    public function toArray(): array;
}
