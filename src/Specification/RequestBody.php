<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Describes a single request body.
 *
 * @property MediaTypes $content
 * @property string|null $description
 * @property boolean|null $required
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
