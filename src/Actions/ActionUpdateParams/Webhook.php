<?php

declare(strict_types=1);

namespace ModerationAPI\Actions\ActionUpdateParams;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type WebhookShape = array{
 *   name: string, url: string, id?: string|null, description?: string|null
 * }
 */
final class Webhook implements BaseModel
{
    /** @use SdkModel<WebhookShape> */
    use SdkModel;

    /**
     * The webhook's name, used to identify it in the dashboard.
     */
    #[Required]
    public string $name;

    /**
     * The webhook's URL. We'll call this URL when the event occurs.
     */
    #[Required]
    public string $url;

    /**
     * ID of an existing webhook or undefined if this is a new webhook.
     */
    #[Optional]
    public ?string $id;

    /**
     * The webhook's description.
     */
    #[Optional(nullable: true)]
    public ?string $description;

    /**
     * `new Webhook()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Webhook::with(name: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Webhook)->withName(...)->withURL(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $name,
        string $url,
        ?string $id = null,
        ?string $description = null
    ): self {
        $self = new self;

        $self['name'] = $name;
        $self['url'] = $url;

        null !== $id && $self['id'] = $id;
        null !== $description && $self['description'] = $description;

        return $self;
    }

    /**
     * The webhook's name, used to identify it in the dashboard.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The webhook's URL. We'll call this URL when the event occurs.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * ID of an existing webhook or undefined if this is a new webhook.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The webhook's description.
     */
    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
