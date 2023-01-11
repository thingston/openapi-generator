<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Describes a single request body.
 *
 * @link https://swagger.io/specification/#request-body-object
 */
final class RequestBody extends AbstractSpecification
{
    /**
     * RequestBody constructor.
     *
     * @param MediaTypes $content
     * @param string|null $description
     * @param bool|null $required
     */
    public function __construct(
        MediaTypes $content,
        ?string $description = null,
        ?bool $required = null
    ) {
        $this->properties['content'] = $content;

        if (null !== $description) {
            $this->properties['description'] = $description;
        }

        if (null !== $required) {
            $this->properties['required'] = $required;
        }
    }

    /**
     * Get content.
     *
     * @return MediaTypes
     */
    public function getContent(): MediaTypes
    {
        return $this->properties['content'];
    }

    /**
     * Set content.
     *
     * @param MediaTypes $content
     * @return self
     */
    public function setContent(MediaTypes $content): self
    {
        $this->properties['content'] = $content;

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
     * Get required.
     *
     * @return bool|null
     */
    public function getRequired(): ?bool
    {
        return $this->properties['required'] ?? null;
    }

    /**
     * Set required.
     *
     * @param bool|null $required
     * @return self
     */
    public function setRequired(?bool $required): self
    {
        $this->properties['required'] = $required;

        return $this;
    }

    /**
     * Create RequestBody instance.
     *
     * @param array<MediaType> $content
     * @param array $options
     * @return self
     */
    public static function create(array $content, array $options = []): self
    {
        $parameters = array_merge($options, [
            'content' => new MediaTypes($content),
        ]);

        return new self(...$parameters);
    }
}
