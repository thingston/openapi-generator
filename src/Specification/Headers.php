<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

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
     * @param Header $header
     * @return self
     */
    public function addHeader(Header $header): self
    {
        $this->properties[] = $header;

        return $this;
    }
}
