<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Adds metadata to a single tag that is used by the Operation Object. It is not
 * mandatory to have a Tag Object per tag defined in the Operation Object instances.
 *
 * @link https://swagger.io/specification/#tag-object
 */
final class Tag extends AbstractSpecification
{
    /**
     * Tag constructor.
     *
     * @param string $name
     * @param string|null $description
     * @param ExternalDocumentation|null $externalDocs
     */
    public function __construct(
        string $name,
        ?string $description = null,
        ?ExternalDocumentation $externalDocs = null
    ) {
        $this->properties['name'] = $name;

        if (null !== $description) {
            $this->properties['description'] = $description;
        }

        if (null !== $externalDocs) {
            $this->properties['externalDocs'] = $externalDocs;
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
     * Create Tag instance.
     *
     * @param string $name
     * @param array $options
     * @return self
     */
    public static function create(string $name, array $options = []): self
    {
        $parameters = array_merge($options, [
            'name' => $name,
        ]);

        return new self(...$parameters);
    }
}
