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
    public function __construct(
        string $description,
        string $status = '200',
        ?MediaTypes $content = null,
        ?Headers $headers = null
    ) {
        $this->key = $status;
        $this->properties['description'] = $description;

        if (null !== $content) {
            $this->properties['content'] = $content;
        }

        if (null !== $headers) {
            $this->properties['headers'] = $headers;
        }
    }

    public static function create(
        string $description,
        array $content,
        string $status = '200',
        array $options = []
    ): self {
        if (isset($options['headers']) && is_array($options['headers'])) {
            $options['headers'] = new Headers($options['headers']);
        }

        $parameters = array_merge($options, [
            'description' => $description,
            'status' => $status,
            'content' => new MediaTypes($content),
        ]);

        return new self(...$parameters);
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
