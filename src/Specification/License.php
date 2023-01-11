<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * License information for the exposed API.
 *
 * @link https://swagger.io/specification/#license-object
 */
final class License extends AbstractSpecification
{
    /**
     * License constructor.
     *
     * @param string $name
     * @param Url|null $url
     */
    public function __construct(
        string $name,
        ?Url $url = null
    ) {
        $this->properties['name'] = $name;

        if (null !== $url) {
            $this->properties['url'] = $url;
        }
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->properties['name'];
    }

    /**
     * Set name.
     *
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->properties['name'] = $name;

        return $this;
    }

    /**
     * Get url.
     *
     * @return Url|null
     */
    public function getUrl(): ?Url
    {
        return $this->properties['url'] ?? null;
    }

    /**
     * Set url.
     *
     * @param Url|null $url
     * @return self
     */
    public function setUrl(?Url $url): self
    {
        $this->properties['url'] = $url;

        return $this;
    }

    /**
     * Create License instance.
     *
     * @param string $name
     * @param Url|string|null $url
     * @return self
     */
    public static function create(string $name, mixed $url = null): self
    {
        if (is_string($url)) {
            $url = new Url($url);
        }

        $parameters = [
            'name' => $name,
            'url' => $url,
        ];

        return new self(...$parameters);
    }
}
