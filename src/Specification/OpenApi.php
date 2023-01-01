<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * This is the root document object of the OpenAPI document.
 *
 * @link https://swagger.io/specification/#openapi-object
 *
 * @method string getOpenapi()
 * @method OpenApi setOpenapi(string $openapi)
 * @method Info getInfo()
 * @method OpenApi setInfo(Info $info)
 * @method Paths getPaths()
 * @method OpenApi setPaths(Paths $paths)
 * @method Servers|null getServers()
 * @method OpenApi setServers(?Servers $servers)
 * @method Components|null getComponents()
 * @method OpenApi setComponents(?Components $components)
 * @method ExternalDocumentation|null getExternalDocs()
 * @method OpenApi setExternalDocs(?ExternalDocumentation $externalDocumentation)
 * @method Tags|null getTags()
 * @method OpenApi setTags(?Tags $tags)
 * @method SecurityRequirements|null getSecurity()
 * @method OpenApi setSecurity(?SecurityRequirements $security)
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
            'tags' => Tags::class,
            'security' => SecurityRequirements::class,
        ];
    }
}
