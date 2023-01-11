<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Provides metadata about the API. The metadata MAY be used by tooling as required.
 *
 * @license https://swagger.io/specification/#info-object
 */
final class Info extends AbstractSpecification
{
    /**
     * Info constructor.
     *
     * @param string $title
     * @param string $version
     * @param string|null $description
     * @param Url|null $termsOfService
     * @param Contact|null $contact
     * @param License|null $license
     */
    public function __construct(
        string $title,
        string $version,
        ?string $description = null,
        ?Url $termsOfService = null,
        ?Contact $contact = null,
        ?License $license = null
    ) {
        $this->properties['title'] = $title;
        $this->properties['version'] = $version;

        if (null !== $description) {
            $this->properties['description'] = $description;
        }

        if (null !== $termsOfService) {
            $this->properties['termsOfService'] = $termsOfService;
        }

        if (null !== $contact) {
            $this->properties['contact'] = $contact;
        }

        if (null !== $license) {
            $this->properties['license'] = $license;
        }
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->properties['title'];
    }

    /**
     * Set title.
     *
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->properties['title'] = $title;

        return $this;
    }

    /**
     * Get version.
     *
     * @return string
     */
    public function getVersion(): string
    {
        return $this->properties['version'];
    }

    /**
     * Set version.
     *
     * @param string $version
     * @return self
     */
    public function setVersion(string $version): self
    {
        $this->properties['version'] = $version;

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
     * Get terms of service.
     *
     * @return Url|null
     */
    public function getTermsOfService(): ?Url
    {
        return $this->properties['termsOfService'] ?? null;
    }

    /**
     * Set terms of service.
     *
     * @param Url|null $termsOfService
     * @return self
     */
    public function setTermsOfService(?Url $termsOfService): self
    {
        $this->properties['termsOfService'] = $termsOfService;

        return $this;
    }

    /**
     * Get contact
     *
     * @return Contact|null
     */
    public function getContact(): ?Contact
    {
        return $this->properties['contact'] ?? null;
    }

    /**
     * Set contact
     *
     * @param Contact|null $contact
     * @return self
     */
    public function setContact(?Contact $contact): self
    {
        $this->properties['contact'] = $contact;

        return $this;
    }

    /**
     * Get license
     *
     * @return License|null
     */
    public function getLicense(): ?License
    {
        return $this->properties['license'] ?? null;
    }

    /**
     * Set license
     *
     * @param License|null $license
     * @return self
     */
    public function setLicense(?License $license): self
    {
        $this->properties['license'] = $license;

        return $this;
    }

    /**
     * Create Info instance.
     *
     * @param string $title
     * @param string $version
     * @param array $options
     * @return self
     */
    public static function create(string $title, string $version, array $options = []): self
    {
        if (isset($options['termsOfService']) && is_string($options['termsOfService'])) {
            $options['termsOfService'] = new Url($options['termsOfService']);
        }

        $parameters = array_merge($options, [
            'title' => $title,
            'version' => $version,
        ]);

        return new self(...$parameters);
    }
}
