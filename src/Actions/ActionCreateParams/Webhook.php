<?php

declare(strict_types=1);

namespace ModerationAPI\Actions\ActionCreateParams;

use ModerationAPI\Core\Attributes\Api;
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
    #[Api]
    public string $name;

    /**
     * The webhook's URL. We'll call this URL when the event occurs.
     */
    #[Api]
    public string $url;

    /**
     * ID of an existing webhook or undefined if this is a new webhook.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The webhook's description.
     */
    #[Api(nullable: true, optional: true)]
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
        $obj = new self;

        $obj->name = $name;
        $obj->url = $url;

        null !== $id && $obj->id = $id;
        null !== $description && $obj->description = $description;

        return $obj;
    }

    /**
     * The webhook's name, used to identify it in the dashboard.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The webhook's URL. We'll call this URL when the event occurs.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    /**
     * ID of an existing webhook or undefined if this is a new webhook.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The webhook's description.
     */
    public function withDescription(?string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }
}
