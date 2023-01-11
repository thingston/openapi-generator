<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Allows referencing an external resource for extended documentation.
 *
 * @link https://swagger.io/specification/#external-documentation-object
 */
final class ExternalDocumentation extends AbstractSpecification
{
    /**
     * ExternalDocuments construct.
     *
     * @param Url $url
     * @param string|null $description
     */
    public function __construct(Url $url, ?string $description = null)
    {
        $this->properties['url'] = $url;

        if (null !== $description) {
            $this->properties['description'] = $description;
        }
    }

    /**
     * Get url.
     *
     * @return Url
     */
    public function getUrl(): Url
    {
        return $this->properties['url'];
    }

    /**
     * Set url.
     *
     * @param Url $url
     * @return self
     */
    public function setUrl(Url $url): self
    {
        $this->properties['url'] = $url;

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
     * Create ExternalDocuments instance.
     *
     * @param Url|string $url
     * @param string|null $description
     * @return self
     */
    public static function create(mixed $url, ?string $description = null): self
    {
        if (is_string($url)) {
            $url = new Url($url);
        }

        return new self($url, $description);
    }
}
