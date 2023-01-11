<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * A simple object to allow referencing other components in the specification,
 * internally and externally.
 *
 * @link https://swagger.io/specification/#reference-object
 */
final class Reference extends AbstractSpecification
{
    /**
     * Reference constructor.
     *
     * @param string $key
     * @param string $ref
     */
    public function __construct(string $key, string $ref)
    {
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
}
