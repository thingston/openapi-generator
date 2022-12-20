<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * @property Responses $responses
 * @property array|null $tags
 * @property string|null $summary
 * @property string|null $description
 * @property ExternalDocumentation|null $externalDocs
 * @property string|null $operationId
 * @property Parameters|null $parameters
 */
final class Operation extends AbstractSpecification
{
    public function __construct(Responses $responses)
    {
        $this->properties['responses'] = $responses;
    }

    public function getRequiredProperties(): array
    {
        return [
            'responses' => Responses::class,
        ];
    }

    public function getOptionalProperties(): array
    {
        return [
            'tags' => 'array',
            'summary' => 'string',
            'description' => 'string',
            'externalDocs' => ExternalDocumentation::class,
            'operationId' => 'string',
            'parameters' => Parameters::class,
        ];
    }
}
