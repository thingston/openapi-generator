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
