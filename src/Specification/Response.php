<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Describes a single response from an API Operation, including design-time, static
 * links to operations based on the response.
 *
 * @link https://swagger.io/specification/#response-object
 */
final class Response extends AbstractSpecification
{
    /**
     * Response constructor.
     *
     * @param string $description
     * @param string $status
     * @param MediaTypes|null $content
     * @param Headers|null $headers
     */
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

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->properties['description'];
    }

    /**
     * Set description.
     *
     * @param string $description
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->properties['description'] = $description;

        return $this;
    }

    /**
     * Get content.
     *
     * @return MediaTypes|null
     */
    public function getContent(): ?MediaTypes
    {
        return $this->properties['content'] ?? null;
    }

    /**
     * Set content.
     *
     * @param MediaTypes|null $content
     * @return self
     */
    public function setContent(?MediaTypes $content): self
    {
        $this->properties['content'] = $content;

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
     * Create Response instance.
     *
     * @param string $description
     * @param array<MediaType> $content
     * @param string $status
     * @param array $options
     * @return self
     */
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
}
