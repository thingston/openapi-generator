<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Describes a single request body.
 *
 * @link https://swagger.io/specification/#request-body-object
 *
 * @method MediaTypes getContent()
 * @method RequestBody setContent(MediaTypes $content)
 * @method string|null getDescription()
 * @method RequestBody setDescription(?string $description)
 * @method bool|null getRequired()
 * @method RequestBody setRequired(?bool $description)
 */
final class RequestBody extends AbstractSpecification
{
    public function __construct(
        MediaTypes $content,
        ?string $description = null,
        ?bool $required = null
    ) {
        $this->properties['content'] = $content;

        if (null !== $description) {
            $this->properties['description'] = $description;
        }

        if (null !== $required) {
            $this->properties['required'] = $required;
        }
    }

    public static function create(array $content, array $options = []): self
    {
        $parameters = array_merge($options, [
            'content' => new MediaTypes($content),
        ]);

        return new self(...$parameters);
    }

    public function getRequiredProperties(): array
    {
        return [
            'content' => MediaTypes::class,
        ];
    }

    public function getOptionalProperties(): array
    {
        return [
            'description' => 'string',
            'required' => 'boolean',
        ];
    }
}
