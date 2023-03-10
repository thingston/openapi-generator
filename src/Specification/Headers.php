<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

use Thingston\OpenApi\Exception\InvalidArgumentException;

/**
 * Collection of header objects.
 *
 * @method Headers addHeader(Header $header)
 */
final class Headers extends AbstractSpecification
{
    /**
     * Headers constructor.
     *
     * @param array $headers
     */
    public function __construct(array $headers = [])
    {
        foreach ($headers as $header) {
            $this->addHeader($header);
        }
    }

    /**
     * Add header.
     *
     * @param Header|HeaderReference $header
     * @return self
     */
    public function addHeader(mixed $header): self
    {
        if (false === $header instanceof Header && false === $header instanceof HeaderReference) {
            throw new InvalidArgumentException('Argument "header" must be of type Header or HeaderReference');
        }

        $this->properties[] = $header;

        return $this;
    }
}
