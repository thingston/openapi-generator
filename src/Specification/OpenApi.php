<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * This is the root document object of the OpenAPI document.
 *
 * @link https://swagger.io/specification/#openapi-object
 */
final class OpenApi extends AbstractSpecification
{
    /**
     * OpenApi specification version.
     */
    public const OA_VERSION = '3.0.3';

    /**
     * OpenApi constructor.
     *
     * @param Info $info
     * @param Paths $paths
     * @param string $openapi
     * @param Servers|null $servers
     * @param Components|null $components
     * @param ExternalDocumentation|null $externalDocs
     * @param Tags|null $tags
     * @param SecurityRequirements|null $security
     */
    public function __construct(
        Info $info,
        Paths $paths,
        string $openapi = self::OA_VERSION,
        ?Servers $servers = null,
        ?Components $components = null,
        ?ExternalDocumentation $externalDocs = null,
        ?Tags $tags = null,
        ?SecurityRequirements $security = null
    ) {
        $this->properties['info'] = $info;
        $this->properties['paths'] = $paths;
        $this->properties['openapi'] = $openapi;

        if (null !== $servers) {
            $this->properties['servers'] = $servers;
        }

        if (null !== $components) {
            $this->properties['components'] = $components;
        }

        if (null !== $externalDocs) {
            $this->properties['externalDocs'] = $externalDocs;
        }

        if (null !== $tags) {
            $this->properties['tags'] = $tags;
        }

        if (null !== $security) {
            $this->properties['security'] = $security;
        }
    }

    /**
     * Get openapi.
     *
     * @return string
     */
    public function getOpenApi(): string
    {
        return $this->properties['openapi'];
    }

    /**
     * Set openapi.
     *
     * @param string $openapi
     * @return self
     */
    public function setOpenApi(string $openapi): self
    {
        $this->properties['openapi'] = $openapi;

        return $this;
    }

    /**
     * Get info.
     *
     * @return Info
     */
    public function getInfo(): Info
    {
        return $this->properties['info'];
    }

    /**
     * Set info.
     *
     * @param Info $info
     * @return self
     */
    public function setInfo(Info $info): self
    {
        $this->properties['info'] = $info;

        return $this;
    }

    /**
     * Get paths.
     *
     * @return Paths
     */
    public function getPaths(): Paths
    {
        return $this->properties['paths'];
    }

    /**
     * Set paths.
     *
     * @param Paths $paths
     * @return self
     */
    public function setPaths(Paths $paths): self
    {
        $this->properties['paths'] = $paths;

        return $this;
    }

    /**
     * Get servers.
     *
     * @return Servers|null
     */
    public function getServers(): ?Servers
    {
        return $this->properties['servers'] ?? null;
    }

    /**
     * Set servers.
     *
     * @param Servers|null $servers
     * @return self
     */
    public function setServers(?Servers $servers): self
    {
        $this->properties['servers'] = $servers;

        return $this;
    }

    /**
     * Get components.
     *
     * @return Components|null
     */
    public function getComponents(): ?Components
    {
        return $this->properties['components'] ?? null;
    }

    /**
     * Set components.
     *
     * @param Components|null $components
     * @return self
     */
    public function setComponents(?Components $components): self
    {
        $this->properties['components'] = $components;

        return $this;
    }

    /**
     * Get external docs.
     *
     * @return ExternalDocumentation|null
     */
    public function getExternalDocs(): ?ExternalDocumentation
    {
        return $this->properties['externalDocs'] ?? null;
    }

    /**
     * Set external docs.
     *
     * @param ExternalDocumentation|null $externalDocs
     * @return self
     */
    public function setExternalDocs(?ExternalDocumentation $externalDocs): self
    {
        $this->properties['externalDocs'] = $externalDocs;

        return $this;
    }

    /**
     * Get tags.
     *
     * @return Tags|null
     */
    public function getTags(): ?Tags
    {
        return $this->properties['tags'] ?? null;
    }

    /**
     * Set tags.
     *
     * @param Tags|null $tags
     * @return self
     */
    public function setTags(?Tags $tags): self
    {
        $this->properties['tags'] = $tags;

        return $this;
    }

    /**
     * Get security.
     *
     * @return SecurityRequirements|null
     */
    public function getSecurity(): ?SecurityRequirements
    {
        return $this->properties['security'] ?? null;
    }

    /**
     * Set security.
     *
     * @param SecurityRequirements|null $security
     * @return self
     */
    public function setSecurity(?SecurityRequirements $security): self
    {
        $this->properties['security'] = $security;

        return $this;
    }

    /**
     * Create OpenApi instance.
     *
     * @param string $title
     * @param string $version
     * @param array<PathItem> $paths
     * @param array $options
     * @return self
     */
    public static function create(string $title, string $version, array $paths, array $options = []): self
    {
        $parameters = array_merge($options, [
            'info' => Info::create($title, $version, $options['info'] ?? []),
            'paths' => new Paths($paths),
        ]);

        return new self(...$parameters);
    }
}
