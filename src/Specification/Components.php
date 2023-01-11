<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Holds a set of reusable objects for different aspects of the OAS. All objects
 * defined within the components object will have no effect on the API unless
 * they are explicitly referenced from properties outside the components object.
 *
 * @link https://swagger.io/specification/#components-object
 */
final class Components extends AbstractSpecification
{
    /**
     * Components constructor.
     *
     * @param Schemas|null $schemas
     * @param Responses|null $responses
     * @param Parameters|null $parameters
     * @param Examples|null $examples
     * @param RequestBodies|null $requestBodies
     * @param Headers|null $headers
     */
    public function __construct(
        ?Schemas $schemas = null,
        ?Responses $responses = null,
        ?Parameters $parameters = null,
        ?Examples $examples = null,
        ?RequestBodies $requestBodies = null,
        ?Headers $headers = null,
    ) {
        if (null !== $schemas) {
            $this->properties['schemas'] = $schemas;
        }

        if (null !== $responses) {
            $this->properties['responses'] = $responses;
        }

        if (null !== $parameters) {
            $this->properties['parameters'] = $parameters;
        }

        if (null !== $examples) {
            $this->properties['examples'] = $examples;
        }

        if (null !== $requestBodies) {
            $this->properties['requestBodies'] = $requestBodies;
        }

        if (null !== $headers) {
            $this->properties['headers'] = $headers;
        }
    }

    /**
     * Get schemas.
     *
     * @return Schemas|null
     */
    public function getSchemas(): ?Schemas
    {
        return $this->properties['schemas'] ?? null;
    }

    /**
     * Set schemas.
     *
     * @param Schemas|null $schemas
     * @return self
     */
    public function setSchemas(?Schemas $schemas): self
    {
        $this->properties['schemas'] = $schemas;

        return $this;
    }

    /**
     * Get responses.
     *
     * @return Responses|null
     */
    public function getResponses(): ?Responses
    {
        return $this->properties['responses'] ?? null;
    }

    /**
     * Set responses.
     *
     * @param Responses|null $responses
     * @return self
     */
    public function setResponses(?Responses $responses): self
    {
        $this->properties['responses'] = $responses;

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
     * Get examples.
     *
     * @return Examples|null
     */
    public function getExamples(): ?Examples
    {
        return $this->properties['examples'] ?? null;
    }

    /**
     * Set examples.
     *
     * @param Examples|null $examples
     * @return self
     */
    public function setExamples(?Examples $examples): self
    {
        $this->properties['examples'] = $examples;

        return $this;
    }

    /**
     * Get headers.
     *
     * @return Headers|null
     */
    public function getHeaders(): ?Headers
    {
        return $this->properties['headers'] ?? null;
    }

    /**
     * Set headers.
     *
     * @param Headers|null $headers
     * @return self
     */
    public function setHeaders(?Headers $headers): self
    {
        $this->properties['headers'] = $headers;

        return $this;
    }

    /**
     * Get request bodies.
     *
     * @return RequestBodies|null
     */
    public function getRequestBodies(): ?RequestBodies
    {
        return $this->properties['requestBodies'] ?? null;
    }

    /**
     * Set request bodies.
     *
     * @param RequestBodies|null $requestBodies
     * @return self
     */
    public function setRequestBodies(?RequestBodies $requestBodies): self
    {
        $this->properties['requestBodies'] = $requestBodies;

        return $this;
    }

    /**
     * Create Components instance.
     *
     * @param array $options
     * @return self
     */
    public static function create(array $options = []): self
    {
        if (isset($options['schemas']) && is_array($options['schemas'])) {
            $options['schemas'] = new Schemas($options['schemas']);
        }

        if (isset($options['responses']) && is_array($options['responses'])) {
            $options['responses'] = new Responses($options['responses']);
        }

        if (isset($options['parameters']) && is_array($options['parameters'])) {
            $options['parameters'] = new Parameters($options['parameters']);
        }

        if (isset($options['examples']) && is_array($options['examples'])) {
            $options['examples'] = new Examples($options['examples']);
        }

        if (isset($options['requestBodies']) && is_array($options['requestBodies'])) {
            $options['requestBodies'] = new RequestBodies($options['requestBodies']);
        }

        if (isset($options['headers']) && is_array($options['headers'])) {
            $options['headers'] = new Headers($options['headers']);
        }

        return new self(...$options);
    }
}
