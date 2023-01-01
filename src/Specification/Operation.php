<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Describes a single API operation on a path.
 *
 * @link https://swagger.io/specification/#operation-object
 *
 * @method Responses getResponses()
 * @method Operation setResponses(Responses $responses)
 * @method string|null getSummary()
 * @method Operation setSummary(?string $summary)
 * @method string|null getDescription()
 * @method Operation setDescription(?string $description)
 * @method ExternalDocumentation|null getExternalDocs()
 * @method Operation setExternalDocs(?ExternalDocumentation $externalDocs)
 * @method string|null getOperationId()
 * @method Operation setOperationId(?string $operationId)
 * @method Parameters|null getParameters()
 * @method Operation setParameters(?Parameters $parameters)
 * @method Tags|null getTags()
 * @method Operation setTags(?Tags $tags)
 * @method SecurityRequirements|null getSecurity()
 * @method Operation setSecurity(?SecurityRequirements $security)
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
            'summary' => 'string',
            'description' => 'string',
            'externalDocs' => ExternalDocumentation::class,
            'operationId' => 'string',
            'parameters' => Parameters::class,
            'tags' => Tags::class,
            'security' => SecurityRequirements::class,
        ];
    }
}
