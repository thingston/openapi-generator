<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Example object.
 *
 * @link https://swagger.io/specification/#example-object
 *
 * @method mixed getValue()
 * @method Example setValue($value)
 * @method string|null getSummary()
 * @method Example setSummary(?string $summary)
 * @method string|null getDescription()
 * @method Example setDescription(?string $description)
 * @method Url|null getexternalValuexternalValue()
 * @method Example setExternalValue(?Url $externalValue)
 */
final class Example extends AbstractSpecification
{
    public function __construct(string $key, $value)
    {
        $this->key = $key;
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
