<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * This is the root document object of the OpenAPI document.
 *
 * @link https://swagger.io/specification/#openapi-object
 *
 * @property string $openapi
 * @property Info $info
 * @property Paths $paths
 * @property Servers|null $servers
 * @property Components|null $components
 * @property ExternalDocumentation|null $externalDocs
 *
 * @todo security
 * @todo tags
 */
final class OpenApi extends AbstractSpecification
{
    public const OA_VERSION = '3.0.3';

    public function __construct(Info $info, Paths $paths, string $openapi = self::OA_VERSION)
    {
        $this->properties['info'] = $info;
        $this->properties['paths'] = $paths;
        $this->properties['openapi'] = $openapi;
    }

    public function getRequiredProperties(): array
    {
        return [
            'openapi' => 'string',
            'info' => Info::class,
            'paths' => Paths::class,
        ];
    }

    public function getOptionalProperties(): array
    {
        return [
            'servers' => Servers::class,
            'components' => Components::class,
            'externalDocs' => ExternalDocumentation::class,
        ];
    }
}
