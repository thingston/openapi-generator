<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Each Media Type Object provides schema and examples for the media type
 * identified by its key.
 *
 * @link https://swagger.io/specification/#media-type-object
 *
 * @method Schema|Reference|null getSchema()
 * @method MediaType setSchema(Schema|Reference|null $schema)
 * @method mixed getExample()
 * @method MediaType setExample($example)
 * @method Examples|null getExamples()
 * @method MediaType setExamples(?Examples $examples)
 */
final class MediaType extends AbstractSpecification
{
    /**
     * Some of the most common content-type identifiers.
     */
    public const TYPE_JSON = 'application/json';
    public const TYPE_HTML = 'text/html';
    public const TYPE_TEXT = 'text/plain';
    public const TYPE_XML = 'text/xml';
    public const TYPE_IMAGE = 'image/*';
    public const TYPE_ANY = '*/*';

    /**
     * MediaType.constructor.
     *
     * @param string $type Expected content-type identifier for the current operation..
     * @param Schema|Reference|null $schema Optional schema or reference.
     * @param mixed $example Any value representing the expected output.
     * @param Examples|null $examples
     */
    public function __construct(
        string $type = self::TYPE_JSON,
        $schema = null,
        $example = null,
        $examples = null
    ) {
        $this->key = $type;

        if (null !== $schema) {
            $this->properties['schema'] = $schema;
        }

        if (null !== $example) {
            $this->properties['example'] = $example;
        }

        if (null !== $examples) {
            $this->properties['examples'] = $examples;
        }
    }

    /**
     * Create a new instance of MediaType.
     *
     * This method acts as a factory for this class using the required and the
     * most common properties as arguments and an extra array of options to provide
     * any other optional properties.
     *
     * @param Schema|Reference|null $schema Optional schema or reference.
     * @param string $type Expected content-type identifier for the current operation..
     * @param array $options An array containing any of the optional properties.
     *
     * @return self
     */
    public static function create(
        $schema,
        string $type = self::TYPE_JSON,
        array $options = []
    ): self {
        if (isset($options['examples']) && is_array($options['examples'])) {
            $options['examples'] = new Examples($options['examples']);
        }

        $parameters = array_merge($options, [
            'schema' => $schema,
            'type' => $type,
        ]);

        return new self(...$parameters);
    }

    /**
     * List of optional properties.
     *
     * @return array Key is the property name while values indicates the accepted
     *               type (or types if separeted by pipes).
     */
    public function getOptionalProperties(): array
    {
        return [
            'schema' => implode('|', [Schema::class, Reference::class]),
            'example' => 'mixed',
            'examples' => implode('|', [Examples::class, Reference::class]),
        ];
    }
}
