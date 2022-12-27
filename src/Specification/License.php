<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * License information for the exposed API.
 *
 * @link https://swagger.io/specification/#license-object
 *
 * @method string getName()
 * @method License setName(string $name)
 * @method Url|null getUrl()
 * @method License setUrl(?Url $url)
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
