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
    public function __construct(MediaTypes $content)
    {
        $this->properties['content'] = $content;
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
