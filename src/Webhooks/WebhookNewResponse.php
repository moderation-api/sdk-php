<?php

declare(strict_types=1);

namespace ModerationAPI\Webhooks;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Webhooks\WebhookNewResponse\EventType;
use ModerationAPI\Webhooks\WebhookNewResponse\PayloadVersion;

/**
 * @phpstan-type WebhookNewResponseShape = array{
 *   id: string,
 *   createdAt: string,
 *   eventTypes: list<EventType|value-of<EventType>>,
 *   name: string,
 *   payloadVersion: PayloadVersion|value-of<PayloadVersion>,
 *   url: string,
 *   description?: string|null,
 * }
 */
final class WebhookNewResponse implements BaseModel
{
    /** @use SdkModel<WebhookNewResponseShape> */
    use SdkModel;

    /**
     * The ID of the webhook.
     */
    #[Required]
    public string $id;

    /**
     * The date the webhook was created.
     */
    #[Required]
    public string $createdAt;

    /**
     * Event types this webhook subscribes to. Empty for legacy v1 webhooks, which subscribe via their single deprecated `type` instead.
     *
     * @var list<value-of<EventType>> $eventTypes
     */
    #[Required(list: EventType::class)]
    public array $eventTypes;

    /**
     * The webhook's name.
     */
    #[Required]
    public string $name;

    /**
     * Payload envelope version. V2 is the Stripe-style envelope; V1 is the legacy flat shape and is read-only via this API.
     *
     * @var value-of<PayloadVersion> $payloadVersion
     */
    #[Required(enum: PayloadVersion::class)]
    public string $payloadVersion;

    /**
     * The URL we call when a subscribed event occurs.
     */
    #[Required]
    public string $url;

    /**
     * The webhook's description.
     */
    #[Optional(nullable: true)]
    public ?string $description;

    /**
     * `new WebhookNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookNewResponse::with(
     *   id: ...,
     *   createdAt: ...,
     *   eventTypes: ...,
     *   name: ...,
     *   payloadVersion: ...,
     *   url: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookNewResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withEventTypes(...)
     *   ->withName(...)
     *   ->withPayloadVersion(...)
     *   ->withURL(...)
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
     *
     * @param PayloadVersion|value-of<PayloadVersion> $payloadVersion
     * @param list<EventType|value-of<EventType>> $eventTypes
     */
    public static function with(
        string $id,
        string $createdAt,
        string $name,
        PayloadVersion|string $payloadVersion,
        string $url,
        array $eventTypes = [],
        ?string $description = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['eventTypes'] = $eventTypes;
        $self['name'] = $name;
        $self['payloadVersion'] = $payloadVersion;
        $self['url'] = $url;

        null !== $description && $self['description'] = $description;

        return $self;
    }

    /**
     * The ID of the webhook.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The date the webhook was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Event types this webhook subscribes to. Empty for legacy v1 webhooks, which subscribe via their single deprecated `type` instead.
     *
     * @param list<EventType|value-of<EventType>> $eventTypes
     */
    public function withEventTypes(array $eventTypes): self
    {
        $self = clone $this;
        $self['eventTypes'] = $eventTypes;

        return $self;
    }

    /**
     * The webhook's name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Payload envelope version. V2 is the Stripe-style envelope; V1 is the legacy flat shape and is read-only via this API.
     *
     * @param PayloadVersion|value-of<PayloadVersion> $payloadVersion
     */
    public function withPayloadVersion(
        PayloadVersion|string $payloadVersion
    ): self {
        $self = clone $this;
        $self['payloadVersion'] = $payloadVersion;

        return $self;
    }

    /**
     * The URL we call when a subscribed event occurs.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

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
