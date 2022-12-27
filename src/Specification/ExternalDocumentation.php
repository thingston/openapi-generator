<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Allows referencing an external resource for extended documentation.
 *
 * @link https://swagger.io/specification/#external-documentation-object
 *
 * @method Url getUrl()
 * @method ExternalDocumentation setUrl(Url $url)
 * @method string|null getDescription()
 * @method ExternalDocumentation setDescription(?string $description)
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
