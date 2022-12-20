<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * @property string $title
 * @property string $version
 * @property string|null $description
 * @property Url|null $termsOfService
 * @property Contact|null $contact
 * @property License|null $license
 */
final class Info extends AbstractSpecification
{
    public function __construct(string $title, string $version)
    {
        $this->properties['title'] = $title;
        $this->properties['version'] = $version;
    }

    public function getRequiredProperties(): array
    {
        return [
            'title' => 'string',
            'version' => 'string',
        ];
    }

    public function getOptionalProperties(): array
    {
        return [
            'description' => 'string',
            'termsOfService' => Url::class,
            'contact' => Contact::class,
            'license' => License::class,
        ];
    }
}
