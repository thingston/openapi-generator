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
    public function __construct(
        Responses $responses,
        ?string $summary = null,
        ?string $description = null,
        ?ExternalDocumentation $externalDocs = null,
        ?string $operationId = null,
        ?Parameters $parameters = null,
        ?Tags $tags = null,
        ?SecurityRequirements $security = null
    ) {
        $this->properties['responses'] = $responses;

        if (null !== $summary) {
            $this->properties['summary'] = $summary;
        }

        if (null !== $description) {
            $this->properties['description'] = $description;
        }

        if (null !== $externalDocs) {
            $this->properties['externalDocs'] = $externalDocs;
        }

        if (null !== $operationId) {
            $this->properties['operationId'] = $operationId;
        }

        if (null !== $parameters) {
            $this->properties['parameters'] = $parameters;
        }

        if (null !== $tags) {
            $this->properties['tags'] = $tags;
        }

        if (null !== $security) {
            $this->properties['security'] = $security;
        }
    }

    public static function create(array $responses, array $options = []): self
    {
        if (isset($options['parameters']) && is_array($options['parameters'])) {
            $options['parameters'] = new Parameters($options['parameters']);
        }

        if (isset($options['tags']) && is_array($options['tags'])) {
            $options['tags'] = new Tags($options['tags']);
        }

        if (isset($options['security']) && is_array($options['security'])) {
            $options['security'] = new SecurityRequirements($options['security']);
        }

        $parameters = array_merge($options, [
            'responses' => new Responses($responses),
        ]);

        return new self(...$parameters);
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
