<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * @property string $name
 * @property Url|null $url
 */
final class License extends AbstractSpecification
{
    public function __construct(string $name)
    {
        $this->properties['name'] = $name;
    }

    public function getRequiredProperties(): array
    {
        return [
            'name' => 'string',
        ];
    }

    public function getOptionalProperties(): array
    {
        return [
            'url' => Url::class,
        ];
    }
}
