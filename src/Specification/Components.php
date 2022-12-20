<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * @property Schemas|null $schemas
 * @property Responses|null $responses
 * @property Parameters|null $parameters
 * @property Examples|null $examples
 * @property RequestBodies|null $requestBodies
 * @property Headers|null $headers
 */
final class Components extends AbstractSpecification
{
    public function getOptionalProperties(): array
    {
        return [
            'schemas' => Schemas::class,
            'responses' => Responses::class,
            'parameters' => Parameters::class,
            'examples' => Examples::class,
            'requestBodies' => RequestBodies::class,
            'headers' => Headers::class,
        ];
    }
}
