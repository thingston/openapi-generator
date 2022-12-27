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
    public function __construct(string $name)
    {
        $this->properties['name'] = $name;
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
