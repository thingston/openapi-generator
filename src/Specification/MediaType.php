<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * @property Schema|Reference|null $schema
 * @property mixed $example
 * @property Examples|null $examples
 */
final class MediaType extends AbstractSpecification
{
    public const TYPE_JSON = 'application/json';
    public const TYPE_HTML = 'text/html';
    public const TYPE_TEXT = 'text/plain';
    public const TYPE_XML = 'text/xml';
    public const TYPE_IMAGE = 'image/*';
    public const TYPE_ANY = '*/*';

    public function __construct(string $key = self::TYPE_JSON)
    {
        $this->key = $key;
    }

    public function getOptionalProperties(): array
    {
        return [
            'schema' => implode('|', [Schema::class, Reference::class]),
            'example' => 'mixed',
            'examples' => Examples::class,
        ];
    }
}
