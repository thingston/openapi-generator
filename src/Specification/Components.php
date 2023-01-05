<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Holds a set of reusable objects for different aspects of the OAS. All objects
 * defined within the components object will have no effect on the API unless
 * they are explicitly referenced from properties outside the components object.
 *
 * @link https://swagger.io/specification/#components-object
 *
 * @method Schemas|null getSchemas()
 * @method Components setSchemas(?Schemas $schmes)
 * @method Responses|null getResponses()
 * @method Components setResponses(?Responses $responses)
 * @method Parameters|null getParameters()
 * @method Components setParameters(?Parameters $parameters)
 * @method Examples|null getExamples()
 * @method Components setExamples(?Examples $examples)
 * @method RequestBodies|null getRequestBodies()
 * @method Components setRequestBodies(?RequestBodies $requestBodies)
 * @method Headers|null getHeaders()
 * @method Components setHeaders(?Headers $headers)
 */
final class Components extends AbstractSpecification
{
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
