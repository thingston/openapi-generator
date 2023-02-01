<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

/**
 * A simple object to allow referencing other components in the specification,
 * internally and externally.
 *
 * @link https://swagger.io/specification/#reference-object
 */
abstract class AbstractReference extends AbstractSpecification
{
    /**
     * Reference constructor.
     *
     * @param string $key
     * @param string $ref
     */
    public function __construct(string $key, string $ref)
    {
        if ('#/components/' !== substr($ref, 0, 13)) {
            throw new InvalidArgumentException('Invalid reference format: ' . $ref);
        }

        $this->key = $key;
        $this->properties['$ref'] = $ref;
    }

    /**
     * Get ref.
     *
     * @return string
     */
    public function getRef(): string
    {
        return $this->properties['$ref'];
    }

    /**
     * Create Reference instance.
     *
     * @param string $key
     * @param string $ref
     * @return self
     */
    public static function create(string $key, string $ref): self
    {
        $class = static::class;

        return new $class($key, $ref);
    }
}
