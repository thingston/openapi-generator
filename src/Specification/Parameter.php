<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Describes a single operation parameter.
 *
 * @link https://swagger.io/specification/#parameter-object
 *
 * @method string getName()
 * @method Parameter setName(string $name)
 * @method string getIn()
 * @method Parameter setIn(Parameter::IN_* $in)
 * @method string|null getDescription()
 * @method Parameter setDescription(?string $description)
 * @method bool|null getRequired()
 * @method Parameter setRequired(?bool $required)
 * @method bool|null getDeprecated()
 * @method Parameter setDeprecated(?bool $deprecated)
 * @method bool|null getAllowEmptyValue()
 * @method Parameter setAllowEmptyValue(?bool $allowEmptyValue)
 */
final class Parameter extends AbstractSpecification
{
    public const IN_PATH = 'path';
    public const IN_QUERY = 'query';
    public const IN_HEADER = 'header';
    public const IN_COOKIE = 'cookie';

    public function __construct(
        string $name,
        string $in,
        ?string $description = null,
        ?bool $required = null,
        ?bool $deprecated = null,
        ?bool $allowEmptyValue = null
    ) {
        $this->properties['name'] = $name;
        $this->properties['in'] = $in;

        if (null !== $description) {
            $this->properties['description'] = $description;
        }

        if (null !== $required) {
            $this->properties['required'] = $required;
        }

        if (null !== $deprecated) {
            $this->properties['deprecated'] = $deprecated;
        }

        if (null !== $allowEmptyValue) {
            $this->properties['allowEmptyValue'] = $allowEmptyValue;
        }
    }

    public static function create(string $name, string $in, array $options = []): self
    {
        $parameters = array_merge($options, [
            'name' => $name,
            'in' => $in,
        ]);

        return new self(...$parameters);
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

    public function assertArrayableType(object $value, string $type = AbstractSpecification::class): void
    {
        parent::assertArrayableType($value, Operation::class);
    }
}
