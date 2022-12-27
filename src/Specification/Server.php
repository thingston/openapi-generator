<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * An object representing a Server.
 *
 * @link https://swagger.io/specification/#server-object
 *
 * @method Url getUrl()
 * @method Server setUrl(Url $url)
 * @method string|null getDescription()
 * @method Server setDescription(?string $description)
 */
final class Server extends AbstractSpecification
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
