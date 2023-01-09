<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Null object schema.
 *
 * @link https://swagger.io/specification/#schema-object
 * @link https://cswr.github.io/JsonSchema/spec/basic_types/#null-schemas
 */
final class NullSchema extends Schema
{
    /**
     * NullSchema constructor.
     *
     * @param string $key
     * @param string|null $title
     * @param string|null $description
     * @param bool|null $nullable
     * @param mixed $example
     */
    public function __construct(
        string $key,
        ?string $title = null,
        ?string $description = null,
        ?bool $nullable = null,
        mixed $example = null
    ) {
        parent::__construct($key, self::TYPE_NULL, $title, $description, $nullable, $example);
    }

    /**
     * Create NullSchema instance.
     *
     * @param string $key
     * @param string|null $title
     * @param array $options
     * @return self
     */
    public static function create(string $key, ?string $title = null, array $options = []): self
    {
        $parameters = array_merge($options, [
            'key' => $key,
            'title' => $title,
        ]);

        return new self(...$parameters);
    }
}
