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
final class SchemaReference extends AbstractReference
{
    /**
     * SchemaReference constructor.
     *
     * @param string $key
     * @param string $ref
     * @throws InvalidArgumentException
     */
    public function __construct(string $key, string $ref)
    {
        if ('#/components/schemas' !== substr($ref, 0, 20)) {
            throw new InvalidArgumentException('Invalid reference format: ' . $ref);
        }

        parent::__construct($key, $ref);
    }
}
