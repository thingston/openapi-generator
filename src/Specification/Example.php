<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * @property string $name
 * @property mixed $value
 * @property string|null $summary
 * @property string|null $description
 * @property Url|null $externalValue
 */
final class Example extends AbstractSpecification
{
    public function __construct(public string $name, $value)
    {
        $this->name = $name;
        $this->properties['value'] = $value;
    }

    public function getRequiredProperties(): array
    {
        return [
            'value' => 'mixed',
        ];
    }

    public function getOptionalProperties(): array
    {
        return [
            'summary' => 'string',
            'description' => 'string',
            'externalValue' => Url::class,
        ];
    }
}
