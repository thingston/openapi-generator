<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * An array of header objects.
 *
 * @method Headers addHeader(Header $header)
 */
final class Headers extends AbstractSpecification
{
    public function __construct(array $headers = [])
    {
        foreach ($headers as $header) {
            $this->addHeader($header);
        }
    }

    public function assertArrayableType(object $value, string $type = AbstractSpecification::class): void
    {
        parent::assertArrayableType($value, Header::class);
    }
}
