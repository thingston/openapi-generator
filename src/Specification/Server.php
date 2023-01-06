<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Specification;

/**
 * An object representing a Server.
 *
 * @link https://swagger.io/specification/#server-object
 *
 * @method Url getUrl()
 * @method Server setUrl(Url $url)
 * @method string|null getDescription()
 * @method Server setDescription(?string $description)
 * @method ServerVariables|null getVariables()
 * @method Server setVariables(?ServerVariables $variables)
 */
final class Server extends AbstractSpecification
{
    public function __construct(
        Url $url,
        ?string $description = null,
        ?ServerVariables $variables = null,
    ) {
        $this->properties['url'] = $url;

        if (null !== $description) {
            $this->properties['description'] = $description;
        }

        if (null !== $variables) {
            $this->properties['variables'] = $variables;
        }
    }

    public static function create($url, array $options = []): self
    {
        if (is_string($url)) {
            $url = new Url($url);
        }

        if (isset($options['variables']) && is_array($options['variables'])) {
            $options['variables'] = new ServerVariables($options['variables']);
        }

        $parameters = array_merge($options, [
            'url' => $url,
        ]);

        return new self(...$parameters);
    }

    public function getRequiredProperties(): array
    {
        return [
            'url' => Url::class,
        ];
    }

    public function getOptionalProperties(): array
    {
        return [
            'description' => 'string',
            'variables' => ServerVariables::class,
        ];
    }
}
