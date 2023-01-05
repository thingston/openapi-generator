<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Describes the operations available on a single path. A Path Item MAY be empty,
 * due to ACL constraints. The path itself is still exposed to the documentation
 * viewer but they will not know which operations and parameters are available.
 *
 * @link https://swagger.io/specification/#path-item-object
 *
 * @method string|null getSummary()
 * @method PathItem setSummary(?string $summary)
 * @method string|null getDescription()
 * @method PathItem setDescription(?string $description)
 * @method Operation|null getGet()
 * @method PathItem setGet(?Operation $get)
 * @method Operation|null getPost()
 * @method PathItem setPost(?Operation $post)
 * @method Operation|null getPut()
 * @method PathItem setPut(?Operation $put)
 * @method Operation|null getPatch()
 * @method PathItem setPatch(?Operation $patch)
 * @method Operation|null getDelete()
 * @method PathItem setDelete(?Operation $delete)
 * @method Operation|null getOptions()
 * @method PathItem setOptions(?Operation $options)
 * @method Operation|null getHead()
 * @method PathItem setHead(?Operation $head)
 * @method Operation|null getTrace()
 * @method PathItem setTrace(?Operation $trace)
 * @method Servers|null getServers()
 * @method PathItem setServers(?Servers $servers)
 * @method Parameters|null getParameters()
 * @method PathItem setParameters(?Parameters $parameters)
 */
final class PathItem extends AbstractSpecification
{
    public function __construct(
        string $path,
        ?string $summary = null,
        ?string $description = null,
        $get = null,
        $post = null,
        $put = null,
        $patch = null,
        $delete = null,
        $options = null,
        $head = null,
        $trace = null,
        $servers = null,
        $parameters = null
    ) {
        $this->key = '/' . trim($path, '/');

        if (null !== $summary) {
            $this->properties['summary'] = $summary;
        }

        if (null !== $description) {
            $this->properties['description'] = $description;
        }

        if (null !== $get) {
            $this->properties['get'] = $get;
        }

        if (null !== $post) {
            $this->properties['post'] = $post;
        }

        if (null !== $put) {
            $this->properties['put'] = $put;
        }

        if (null !== $patch) {
            $this->properties['patch'] = $patch;
        }

        if (null !== $delete) {
            $this->properties['delete'] = $delete;
        }

        if (null !== $options) {
            $this->properties['options'] = $options;
        }

        if (null !== $head) {
            $this->properties['head'] = $head;
        }

        if (null !== $trace) {
            $this->properties['trace'] = $trace;
        }

        if (null !== $servers) {
            $this->properties['servers'] = $servers;
        }

        if (null !== $parameters) {
            $this->properties['parameters'] = $parameters;
        }
    }

    public static function create(string $path, array $options = []): self
    {
        if (isset($options['servers']) && is_array($options['servers'])) {
            $options['servers'] = new Servers($options['servers']);
        }

        if (isset($options['parameters']) && is_array($options['parameters'])) {
            $options['parameters'] = new Parameters($options['parameters']);
        }

        $parameters = array_merge($options, [
            'path' => $path,
        ]);

        return new self(...$parameters);
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
