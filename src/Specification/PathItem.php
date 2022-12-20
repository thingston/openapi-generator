<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * @property string|null $summary
 * @property string|null $description
 * @property Operation|Reference|null $get
 * @property Operation|Reference|null $post
 * @property Operation|Reference|null $put
 * @property Operation|Reference|null $patch
 * @property Operation|Reference|null $delete
 * @property Operation|Reference|null $options
 * @property Operation|Reference|null $head
 * @property Operation|Reference|null $trace
 * @property Servers|null $servers
 * @property Parameters|null $parameters
 */
final class PathItem extends AbstractSpecification
{
    public function __construct(string $key)
    {
        $this->key = '/' . trim($key, '/');
    }

    public function getOptionalProperties(): array
    {
        return [
            'summary' => 'string',
            'description' => 'string',
            'get' => implode('|', [Operation::class, Reference::class]),
            'post' => implode('|', [Operation::class, Reference::class]),
            'put' => implode('|', [Operation::class, Reference::class]),
            'patch' => implode('|', [Operation::class, Reference::class]),
            'delete' => implode('|', [Operation::class, Reference::class]),
            'options' => implode('|', [Operation::class, Reference::class]),
            'head' => implode('|', [Operation::class, Reference::class]),
            'trace' => implode('|', [Operation::class, Reference::class]),
            'servers' => Servers::class,
            'parameters' => implode('|', [Parameters::class, Reference::class]),
        ];
    }
}
