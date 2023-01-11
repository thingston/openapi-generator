<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Describes the operations available on a single path. A Path Item MAY be empty,
 * due to ACL constraints. The path itself is still exposed to the documentation
 * viewer but they will not know which operations and parameters are available.
 *
 * @link https://swagger.io/specification/#path-item-object
 */
final class PathItem extends AbstractSpecification
{
    /**
     * PathItem constructor.
     *
     * @param string $path
     * @param string|null $summary
     * @param string|null $description
     * @param Operation|null $get
     * @param Operation|null $post
     * @param Operation|null $put
     * @param Operation|null $patch
     * @param Operation|null $delete
     * @param Operation|null $options
     * @param Operation|null $head
     * @param Operation|null $trace
     * @param Servers|null $servers
     * @param Parameters|null $parameters
     */
    public function __construct(
        string $path,
        ?string $summary = null,
        ?string $description = null,
        ?Operation $get = null,
        ?Operation $post = null,
        ?Operation $put = null,
        ?Operation $patch = null,
        ?Operation $delete = null,
        ?Operation $options = null,
        ?Operation $head = null,
        ?Operation $trace = null,
        ?Servers $servers = null,
        ?Parameters $parameters = null
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

    /**
     * Get summary.
     *
     * @return string|null
     */
    public function getSummary(): ?string
    {
        return $this->properties['summary'] ?? null;
    }

    /**
     * Set summary.
     *
     * @param string|null $summary
     * @return self
     */
    public function setSummary(?string $summary): self
    {
        $this->properties['summary'] = $summary;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->properties['description'] ?? null;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->properties['description'] = $description;

        return $this;
    }

    /**
     * Get get.
     *
     * @return Operation|null
     */
    public function getGet(): ?Operation
    {
        return $this->properties['get'] ?? null;
    }

    /**
     * Set get.
     *
     * @param Operation|null $get
     * @return self
     */
    public function setGet(?Operation $get): self
    {
        $this->properties['get'] = $get;

        return $this;
    }

    /**
     * Get post.
     *
     * @return Operation|null
     */
    public function getPost(): ?Operation
    {
        return $this->properties['post'] ?? null;
    }

    /**
     * Set post.
     *
     * @param Operation|null $post
     * @return self
     */
    public function setPost(?Operation $post): self
    {
        $this->properties['post'] = $post;

        return $this;
    }

    /**
     * Get put.
     *
     * @return Operation|null
     */
    public function getPut(): ?Operation
    {
        return $this->properties['put'] ?? null;
    }

    /**
     * Set put.
     *
     * @param Operation|null $put
     * @return self
     */
    public function setPut(?Operation $put): self
    {
        $this->properties['put'] = $put;

        return $this;
    }

    /**
     * Get patch.
     *
     * @return Operation|null
     */
    public function getPatch(): ?Operation
    {
        return $this->properties['patch'] ?? null;
    }

    /**
     * Set patch.
     *
     * @param Operation|null $patch
     * @return self
     */
    public function setPatch(?Operation $patch): self
    {
        $this->properties['patch'] = $patch;

        return $this;
    }

    /**
     * Get delete.
     *
     * @return Operation|null
     */
    public function getDelete(): ?Operation
    {
        return $this->properties['delete'] ?? null;
    }

    /**
     * Set patch.
     *
     * @param Operation|null $patch
     * @return self
     */
    public function setDelete(?Operation $patch): self
    {
        $this->properties['delete'] = $patch;

        return $this;
    }

    /**
     * Get options.
     *
     * @return Operation|null
     */
    public function getOptions(): ?Operation
    {
        return $this->properties['options'] ?? null;
    }

    /**
     * Set options.
     *
     * @param Operation|null $options
     * @return self
     */
    public function setOptions(?Operation $options): self
    {
        $this->properties['options'] = $options;

        return $this;
    }

    /**
     * Get head.
     *
     * @return Operation|null
     */
    public function getHead(): ?Operation
    {
        return $this->properties['head'] ?? null;
    }

    /**
     * Set head.
     *
     * @param Operation|null $head
     * @return self
     */
    public function setHead(?Operation $head): self
    {
        $this->properties['head'] = $head;

        return $this;
    }

    /**
     * Get trace.
     *
     * @return Operation|null
     */
    public function getTrace(): ?Operation
    {
        return $this->properties['trace'] ?? null;
    }

    /**
     * Set trace.
     *
     * @param Operation|null $trace
     * @return self
     */
    public function setTrace(?Operation $trace): self
    {
        $this->properties['trace'] = $trace;

        return $this;
    }

    /**
     * Get servers.
     *
     * @return Servers|null
     */
    public function getServers(): ?Servers
    {
        return $this->properties['servers'] ?? null;
    }

    /**
     * Set servers.
     *
     * @param Servers|null $servers
     * @return self
     */
    public function setServers(?Servers $servers): self
    {
        $this->properties['servers'] = $servers;

        return $this;
    }

    /**
     * Get parameters.
     *
     * @return Parameters|null
     */
    public function getParameters(): ?Parameters
    {
        return $this->properties['parameters'] ?? null;
    }

    /**
     * Set parameters.
     *
     * @param Parameters|null $parameters
     * @return self
     */
    public function setParameters(?Parameters $parameters): self
    {
        $this->properties['parameters'] = $parameters;

        return $this;
    }

    /**
     * Create PathItem instance.
     *
     * @param string $path
     * @param array $options
     * @return self
     */
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
}
