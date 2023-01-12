<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

/**
 * Describes a single API operation on a path.
 *
 * @link https://swagger.io/specification/#operation-object
 */
final class Operation extends AbstractSpecification
{
    /**
     * Operation constructor.
     *
     * @param Responses $responses
     * @param string|null $summary
     * @param string|null $description
     * @param ExternalDocumentation|null $externalDocs
     * @param string|null $operationId
     * @param Parameters|null $parameters
     * @param RequestBody|Reference|null $requestBody
     * @param Tags|null $tags
     * @param SecurityRequirements|null $security
     */
    public function __construct(
        Responses $responses,
        ?string $summary = null,
        ?string $description = null,
        ?ExternalDocumentation $externalDocs = null,
        ?string $operationId = null,
        ?Parameters $parameters = null,
        mixed $requestBody = null,
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

        if (
            false === $requestBody instanceof RequestBody
            && false === $requestBody instanceof Reference
            && null !== $requestBody
        ) {
            $message = 'Argument "requestBody" must be of the type RequestBody, Reference or null.';
            throw new InvalidArgumentException($message);
        }

        if (null !== $requestBody) {
            $this->properties['requestBody'] = $requestBody;
        }

        if (null !== $tags) {
            $this->properties['tags'] = $tags;
        }

        if (null !== $security) {
            $this->properties['security'] = $security;
        }
    }

    /**
     * Get responses.
     *
     * @return Responses
     */
    public function getResponses(): Responses
    {
        return $this->properties['responses'];
    }

    /**
     * Set responses.
     *
     * @param Responses $responses
     * @return self
     */
    public function setResponses(Responses $responses): self
    {
        $this->properties['responses'] = $responses;

        return $this;
    }

    /**
     * Get summary.
     *
     * @return string|null
     */
    public function getSummary(): ?string
    {
        return $this->properties['summary'] ?? null;
    }

    /**
     * Set summary.
     *
     * @param string|null $summary
     * @return self
     */
    public function setSummary(?string $summary): self
    {
        $this->properties['summary'] = $summary;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->properties['description'] ?? null;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->properties['description'] = $description;

        return $this;
    }

    /**
     * Get external docs.
     *
     * @return ExternalDocumentation|null
     */
    public function getExternalDocs(): ?ExternalDocumentation
    {
        return $this->properties['externalDocs'] ?? null;
    }

    /**
     * Set external docs.
     *
     * @param ExternalDocumentation|null $externalDocs
     * @return self
     */
    public function setExternalDocs(?ExternalDocumentation $externalDocs): self
    {
        $this->properties['externalDocs'] = $externalDocs;

        return $this;
    }

    /**
     * Get operation id.
     *
     * @return string|null
     */
    public function getOperationId(): ?string
    {
        return $this->properties['operationId'] ?? null;
    }

    /**
     * Set operation id.
     *
     * @param string|null $operationId
     * @return self
     */
    public function setOperationId(?string $operationId): self
    {
        $this->properties['operationId'] = $operationId;

        return $this;
    }

    /**
     * Get parameters.
     *
     * @return Parameters|null
     */
    public function getParameters(): ?Parameters
    {
        return $this->properties['parameters'] ?? null;
    }

    /**
     * Set parameters.
     *
     * @param Parameters|null $parameters
     * @return self
     */
    public function setParameters(?Parameters $parameters): self
    {
        $this->properties['parameters'] = $parameters;

        return $this;
    }

    /**
     * Get request body.
     *
     * @return RequestBody|null
     */
    public function getRequestBody(): ?RequestBody
    {
        return $this->properties['requestBody'] ?? null;
    }

    /**
     * Set request body.
     *
     * @param RequestBody|Reference|null $requestBody
     * @return self
     */
    public function setRequestBody(mixed $requestBody): self
    {
        if (
            false === $requestBody instanceof RequestBody
            && false === $requestBody instanceof Reference
            && null !== $requestBody
        ) {
            $message = 'Argument "requestBody" must be of the type RequestBody, Reference or null.';
            throw new InvalidArgumentException($message);
        }

        $this->properties['requestBody'] = $requestBody;

        return $this;
    }

    /**
     * Get tags.
     *
     * @return Tags|null
     */
    public function getTags(): ?Tags
    {
        return $this->properties['tags'] ?? null;
    }

    /**
     * Set tags.
     *
     * @param Tags|null $tags
     * @return self
     */
    public function setTags(?Tags $tags): self
    {
        $this->properties['tags'] = $tags;

        return $this;
    }

    /**
     * Get security.
     *
     * @return SecurityRequirements|null
     */
    public function getSecurity(): ?SecurityRequirements
    {
        return $this->properties['security'] ?? null;
    }

    /**
     * Set security.
     *
     * @param SecurityRequirements|null $security
     * @return self
     */
    public function setSecurity(?SecurityRequirements $security): self
    {
        $this->properties['security'] = $security;

        return $this;
    }

    /**
     * Create Operation instance.
     *
     * @param array<Response> $responses
     * @param array $options
     * @return self
     */
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
}
