<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Adds metadata to a single tag that is used by the Operation Object. It is not
 * mandatory to have a Tag Object per tag defined in the Operation Object instances.
 *
 * @link https://swagger.io/specification/#tag-object
 *
 * @method string getName()
 * @method Tag setName(string $name)
 * @method string|null getDescription()
 * @method Tag setDescription(?string $description)
 * @method ExternalDocumentation|null getExternalDocs()
 * @method Tag setExternalDocs(?ExternalDocumentation $externalDocs)
 */
final class Tag extends AbstractSpecification
{
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

    public static function create(string $name, array $options = []): self
    {
        $parameters = array_merge($options, [
            'name' => $name,
        ]);

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
            'description' => 'string',
            'externalDocs' => ExternalDocumentation::class,
        ];
    }
}
