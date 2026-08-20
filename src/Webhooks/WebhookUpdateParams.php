<?php

declare(strict_types=1);

namespace ModerationAPI\Webhooks;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Webhooks\WebhookUpdateParams\EventType;

/**
 * Update a webhook. Legacy v1 webhooks are read-only: delete them and create a new webhook instead.
 *
 * @see ModerationAPI\Services\WebhooksService::update()
 *
 * @phpstan-type WebhookUpdateParamsShape = array{
 *   description?: string|null,
 *   eventTypes?: list<EventType|value-of<EventType>>|null,
 *   name?: string|null,
 *   url?: string|null,
 * }
 */
final class WebhookUpdateParams implements BaseModel
{
    /** @use SdkModel<WebhookUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The webhook's description.
     */
    #[Optional(nullable: true)]
    public ?string $description;

    /**
     * Event types this webhook subscribes to. One webhook URL receives all events you list here.
     *
     * @var list<value-of<EventType>>|null $eventTypes
     */
    #[Optional(list: EventType::class)]
    public ?array $eventTypes;

    /**
     * The webhook's name, used to identify it in the dashboard.
     */
    #[Optional]
    public ?string $name;

    /**
     * The webhook's URL. We'll call this URL when an event occurs.
     */
    #[Optional]
    public ?string $url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<EventType|value-of<EventType>>|null $eventTypes
     */
    public static function with(
        ?string $description = null,
        ?array $eventTypes = null,
        ?string $name = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $description && $self['description'] = $description;
        null !== $eventTypes && $self['eventTypes'] = $eventTypes;
        null !== $name && $self['name'] = $name;
        null !== $url && $self['url'] = $url;

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

    /**
     * Event types this webhook subscribes to. One webhook URL receives all events you list here.
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
     * The webhook's name, used to identify it in the dashboard.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The webhook's URL. We'll call this URL when an event occurs.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
