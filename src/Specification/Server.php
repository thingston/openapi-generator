<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * An object representing a Server.
 *
 * @link https://swagger.io/specification/#server-object
 * @method Server setVariables(?ServerVariables $variables)
 */
final class Server extends AbstractSpecification
{
    /**
     * Server constructor.
     *
     * @param Url $url
     * @param string|null $description
     * @param ServerVariables|null $variables
     */
    public function __construct(
        Url $url,
        ?string $description = null,
        ?ServerVariables $variables = null,
    ) {
        $this->properties['url'] = $url;

        if (null !== $description) {
            $this->properties['description'] = $description;
        }

        if (null !== $variables) {
            $this->properties['variables'] = $variables;
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
     * Get variables.
     *
     * @return ServerVariables|null
     */
    public function getVariables(): ?ServerVariables
    {
        return $this->properties['variables'] ?? null;
    }

    /**
     * Set variables.
     *
     * @param ServerVariables|null $variables
     * @return self
     */
    public function setVariables(?ServerVariables $variables): self
    {
        $this->properties['variables'] = $variables;

        return $this;
    }

    /**
     * Create Server instance.
     *
     * @param Url|string $url
     * @param array $options
     * @return self
     */
    public static function create(mixed $url, array $options = []): self
    {
        if (is_string($url)) {
            $url = new Url($url);
        }

        if (isset($options['variables']) && is_array($options['variables'])) {
            $options['variables'] = new ServerVariables($options['variables']);
        }

        $parameters = array_merge($options, [
            'url' => $url,
        ]);

        return new self(...$parameters);
    }

    public function getRequiredProperties(): array
    {
        return [
            'url' => Url::class,
        ];
    }

    public function getOptionalProperties(): array
    {
        return [
            'description' => 'string',
            'variables' => ServerVariables::class,
        ];
    }
}
