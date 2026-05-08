<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\WebhookEvent;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\WebhookEvent\AuthorSuspendedEvent\Data;

/**
 * @phpstan-import-type DataShape from \ModerationAPI\Queue\WebhookEvent\AuthorSuspendedEvent\Data
 *
 * @phpstan-type AuthorSuspendedEventShape = array{
 *   id: string,
 *   apiVersion: 'v2',
 *   created: \DateTimeInterface,
 *   data: Data|DataShape,
 *   type: 'author.suspended',
 * }
 */
final class AuthorSuspendedEvent implements BaseModel
{
    /** @use SdkModel<AuthorSuspendedEventShape> */
    use SdkModel;

    /** @var 'v2' $apiVersion */
    #[Required('api_version')]
    public string $apiVersion = 'v2';

    /**
     * The event type.
     *
     * @var 'author.suspended' $type
     */
    #[Required]
    public string $type = 'author.suspended';

    /**
     * Stable event ID. Use this to dedupe retries.
     */
    #[Required]
    public string $id;

    /**
     * ISO 8601 timestamp of when the event was emitted.
     */
    #[Required]
    public \DateTimeInterface $created;

    #[Required]
    public Data $data;

    /**
     * `new AuthorSuspendedEvent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthorSuspendedEvent::with(id: ..., created: ..., data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AuthorSuspendedEvent)->withID(...)->withCreated(...)->withData(...)
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
     * @param Data|DataShape $data
     */
    public static function with(
        string $id,
        \DateTimeInterface $created,
        Data|array $data
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['created'] = $created;
        $self['data'] = $data;

        return $self;
    }

    /**
     * Stable event ID. Use this to dedupe retries.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param 'v2' $apiVersion
     */
    public function withAPIVersion(string $apiVersion): self
    {
        $self = clone $this;
        $self['apiVersion'] = $apiVersion;

        return $self;
    }

    /**
     * ISO 8601 timestamp of when the event was emitted.
     */
    public function withCreated(\DateTimeInterface $created): self
    {
        $self = clone $this;
        $self['created'] = $created;

        return $self;
    }

    /**
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * The event type.
     *
     * @param 'author.suspended' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
