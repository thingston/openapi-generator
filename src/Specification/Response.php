<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Describes a single response from an API Operation, including design-time, static
 * links to operations based on the response.
 *
 * @link https://swagger.io/specification/#response-object
 *
 * @method string getDescription()
 * @method Response setDescription(string $description)
 * @method Headers|null getHeaders()
 * @method Response setHeaders(?Headers $headers)
 * @method MediaTypes|null getContent()
 * @method Response setContent(?MediaTypes $content)
 */
final class Response extends AbstractSpecification
{
    public function __construct(string $description, string $key = '200')
    {
        $this->key = $key;
        $this->properties['description'] = $description;
    }

    public function getRequiredProperties(): array
    {
        return [
            'description' => 'string',
        ];
    }

    public function getOptionalProperties(): array
    {
        return [
            'headers' => Headers::class,
            'content' => MediaTypes::class,
        ];
    }
}
