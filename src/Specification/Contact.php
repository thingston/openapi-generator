<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Contact information for the exposed API.
 *
 * @link https://swagger.io/specification/#contact-object
 *
 * @method string getName()
 * @method Contact setName(string $name)
 * @method Url|null getUrl()
 * @method Contact setUrl(?Url $url)
 * @method Email|null getEmail()
 * @method Contact setEmail(?Email $email)
 */
final class Contact extends AbstractSpecification
{
    public function __construct(
        string $name,
        $url = null,
        $email = null
    ) {
        $this->properties['name'] = $name;

        if (is_string($email)) {
            $email = new Email($email);
        }

        if (null !== $email) {
            $this->properties['email'] = $email;
        }

        if (is_string($url)) {
            $url = new Url($url);
        }

        if (null !== $url) {
            $this->properties['url'] = $url;
        }
    }

    public static function create(string $name, ?string $email = null, ?string $url = null): self
    {
        $parameters = [
            'name' => $name,
            'email' => $email,
            'url' => $url,
        ];

        return new self(...$parameters);
    }

    public function getRequiredProperties(): array
    {
        return [
            'name' => 'string',
        ];
    }

    public function getOptionalProperties(): array
    {
        return [
            'url' => Url::class,
            'email' => Email::class,
        ];
    }
}
