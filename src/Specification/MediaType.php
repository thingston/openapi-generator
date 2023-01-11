<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

/**
 * Each Media Type Object provides schema and examples for the media type
 * identified by its key.
 *
 * @link https://swagger.io/specification/#media-type-object
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
     * @param string $key
     * @param Schema|Reference|null $schema
     * @param mixed $example
     * @param Examples|null $examples
     */
    public function __construct(
        string $key = self::TYPE_JSON,
        mixed $schema = null,
        mixed $example = null,
        ?Examples $examples = null
    ) {
        $this->key = $key;

        if (false === $schema instanceof Schema && false === $schema instanceof Reference && null !== $schema) {
            throw new InvalidArgumentException('Argument "schema" must be of type Schema, Reference or null.');
            ;
        }

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
     * Get schema.
     *
     * @return Schema|Reference|null
     */
    public function getSchema(): mixed
    {
        return $this->properties['schema'] ?? null;
    }

    /**
     * Set schema.
     *
     * @param Schema|Reference|null $schema
     * @return self
     */
    public function setSchema(mixed $schema): self
    {
        $this->properties['schema'] = $schema;

        return $this;
    }

    /**
     * Get example.
     *
     * @return mixed
     */
    public function getExample(): mixed
    {
        return $this->properties['example'] ?? null;
    }

    /**
     * Set example.
     *
     * @param mixed $example
     * @return self
     */
    public function setExample(mixed $example): self
    {
        $this->properties['example'] = $example;

        return $this;
    }

    /**
     * Get examples.
     *
     * @return Examples|null
     */
    public function getExamples(): ?Examples
    {
        return $this->properties['examples'] ?? null;
    }

    /**
     * Set examples.
     *
     * @param Examples|null $examples
     * @return self
     */
    public function setExamples(?Examples $examples): self
    {
        $this->properties['examples'] = $examples;

        return $this;
    }

    /**
     * Create a new instance of MediaType.
     *
     * @param Schema|Reference|null $schema
     * @param string $key
     * @param array $options
     * @return self
     */
    public static function create(
        mixed $schema,
        string $key = self::TYPE_JSON,
        array $options = []
    ): self {
        if (isset($options['examples']) && is_array($options['examples'])) {
            $options['examples'] = new Examples($options['examples']);
        }

        $parameters = array_merge($options, [
            'schema' => $schema,
            'key' => $key,
        ]);

        return new self(...$parameters);
    }
}
