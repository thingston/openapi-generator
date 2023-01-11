<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Contact information for the exposed API.
 *
 * @link https://swagger.io/specification/#contact-object
 */
final class Contact extends AbstractSpecification
{
    /**
     * Contact constructor.
     *
     * @param string $name
     * @param Url|null $url
     * @param Email|null $email
     */
    public function __construct(
        string $name,
        ?Url $url = null,
        ?Email $email = null
    ) {
        $this->properties['name'] = $name;

        if (null !== $email) {
            $this->properties['email'] = $email;
        }

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
     * Get email.
     *
     * @return Email|null
     */
    public function getEmail(): ?Email
    {
        return $this->properties['email'] ?? null;
    }

    /**
     * Set email.
     *
     * @param Email|null $email
     * @return self
     */
    public function setEmail(?Email $email): self
    {
        $this->properties['email'] = $email;

        return $this;
    }

    /**
     * Create Contact instance.
     *
     * @param string $name
     * @param Email|string|null $email
     * @param Url|string|null $url
     * @return self
     */
    public static function create(string $name, mixed $email = null, mixed $url = null): self
    {
        if (is_string($url)) {
            $url = new Url($url);
        }

        if (is_string($email)) {
            $email = new Email($email);
        }

        $parameters = [
            'name' => $name,
            'email' => $email,
            'url' => $url,
        ];

        return new self(...$parameters);
    }
}
