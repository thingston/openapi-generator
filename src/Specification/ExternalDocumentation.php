<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * @property Url $url
 * @property string|null $description
 */
final class ExternalDocumentation extends AbstractSpecification
{
    public function __construct(Url $url)
    {
        $this->properties['url'] = $url;
    }

    public function getRequiredProperties(): array
    {
        return [
            'url' => Url::class,
        ];
    }

    public function getOptionalProperties(): array
    {
        return [
            'description' => 'string',
        ];
    }
}
