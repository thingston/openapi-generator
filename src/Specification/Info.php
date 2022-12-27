<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Provides metadata about the API. The metadata MAY be used by tooling as required.
 *
 * @license https://swagger.io/specification/#info-object
 *
 * @method string getTitle()
 * @method Info setTitle(string $title)
 * @method string getVersion()
 * @method Info setVersion(string $version)
 * @method string|null getDescription()
 * @method Info setDescription(?string $description)
 * @method Url|null getTermsOfService()
 * @method Info setTermsOfService(?Url $termsOfService)
 * @method Contact|null getContact()
 * @method Info setContact(?Contact $contact)
 * @method License|null getLicense()
 * @method Info setLicense(?License $license)
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
