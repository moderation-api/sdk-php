<?php

declare(strict_types=1);

namespace ModerationAPI\Actions\ActionGetResponse;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type WebhookShape = array{
 *   id: string,
 *   name: string,
 *   url: string,
 *   description?: string|null,
 *   moderationActionID?: string|null,
 * }
 */
final class Webhook implements BaseModel
{
    /** @use SdkModel<WebhookShape> */
    use SdkModel;

    /**
     * The ID of the webhook.
     */
    #[Required]
    public string $id;

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
     * The webhook's description.
     */
    #[Optional(nullable: true)]
    public ?string $description;

    /**
     * The ID of the moderation action to trigger the webhook on. Only used for moderation action webhooks.
     */
    #[Optional('moderationActionId', nullable: true)]
    public ?string $moderationActionID;

    /**
     * `new Webhook()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Webhook::with(id: ..., name: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Webhook)->withID(...)->withName(...)->withURL(...)
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
        string $id,
        string $name,
        string $url,
        ?string $description = null,
        ?string $moderationActionID = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['name'] = $name;
        $obj['url'] = $url;

        null !== $description && $obj['description'] = $description;
        null !== $moderationActionID && $obj['moderationActionID'] = $moderationActionID;

        return $obj;
    }

    /**
     * The ID of the webhook.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The webhook's name, used to identify it in the dashboard.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The webhook's URL. We'll call this URL when the event occurs.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }

    /**
     * The webhook's description.
     */
    public function withDescription(?string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * The ID of the moderation action to trigger the webhook on. Only used for moderation action webhooks.
     */
    public function withModerationActionID(?string $moderationActionID): self
    {
        $obj = clone $this;
        $obj['moderationActionID'] = $moderationActionID;

        return $obj;
    }
}
