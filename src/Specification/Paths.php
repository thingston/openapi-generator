<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Collection of pathItem objects.
 */
final class Paths extends AbstractSpecification
{
    /**
     * Paths constructor.
     *
     * @param array $paths
     */
    public function __construct(array $paths = [])
    {
        foreach ($paths as $path) {
            $this->addPathItem($path);
        }
    }

    /**
     * Add path item.
     *
     * @param PathItem $pathItem
     * @return self
     */
    public function addPathItem(PathItem $pathItem): self
    {
        $this->properties[] = $pathItem;

        return $this;
    }
}
