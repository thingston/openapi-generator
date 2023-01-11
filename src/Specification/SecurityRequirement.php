<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Lists the required security schemes to execute this operation. The name used
 * for each property MUST correspond to a security scheme declared in the Security
 * Schemes under the Components Object.
 *
 * @link https://swagger.io/specification/#security-requirement-object
 */
final class SecurityRequirement extends AbstractSpecification
{
    /**
     * SecurityRequirement constructor.
     *
     * @param string $key
     * @param array<string> $scopes
     */
    public function __construct(string $key, array $scopes = [])
    {
        $this->key = $key;
        $this->properties['scopes'] = $scopes;
    }

    /**
     * Get scopes.
     *
     * @return array<string>
     */
    public function getScopes(): array
    {
        return $this->properties['scopes'];
    }

    /**
     * Output this specification as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            $this->key => $this->properties['scopes'],
        ];
    }
}
