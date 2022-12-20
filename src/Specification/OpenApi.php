<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * @property string $openapi
 * @property Info $info
 */
final class OpenApi extends AbstractSpecification
{
    public const OA_VERSION = '3.0.3';

    public function __construct(Info $info, string $openapi = self::OA_VERSION)
    {
        $this->properties['info'] = $info;
        $this->properties['openapi'] = $openapi;
    }

    public function getRequiredProperties(): array
    {
        return [
            'openapi' => 'string',
            'info' => Info::class,
        ];
    }
}
