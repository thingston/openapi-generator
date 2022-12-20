<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * @property string $name
 * @property string $in
 * @property string|null $description
 * @property bool|null $required
 * @property bool|null $deprecated
 * @property bool|null $allowEmptyValue
 */
final class Parameter extends AbstractSpecification
{
    public const IN_PATH = 'path';
    public const IN_QUERY = 'query';
    public const IN_HEADER = 'header';
    public const IN_COOKIE = 'cookie';

    public function __construct(string $name, string $in)
    {
        $this->properties['name'] = $name;
        $this->properties['in'] = $in;
    }

    public function getRequiredProperties(): array
    {
        return [
            'name' => 'string',
            'in' => 'string',
        ];
    }

    public function getOptionalProperties(): array
    {
        return [
            'description' => 'string',
            'required' => 'boolean',
            'deprecated' => 'boolean',
            'allowEmptyValue' => 'boolean',
        ];
    }
}
