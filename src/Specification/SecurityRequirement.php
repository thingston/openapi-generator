<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * Lists the required security schemes to execute this operation. The name used
 * for each property MUST correspond to a security scheme declared in the Security
 * Schemes under the Components Object.
 *
 * @link https://swagger.io/specification/#security-requirement-object
 *
 * @method string[] getScopes()
 * @method SecurityRequirement setScopes(array $scopes)
 */
final class SecurityRequirement extends AbstractSpecification
{
    public function __construct(string $key, array $scopes = [])
    {
        $this->key = $key;
        $this->properties['scopes'] = $scopes;
    }

    public function getRequiredProperties(): array
    {
        return [
            'scopes' => 'array',
        ];
    }

    public function toArray(): array
    {
        return [
            $this->key => $this->properties['scopes'],
        ];
    }
}
