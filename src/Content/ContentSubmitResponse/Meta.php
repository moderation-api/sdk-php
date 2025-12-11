<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse;

use ModerationAPI\Content\ContentSubmitResponse\Meta\Status;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Metadata about the moderation request.
 *
 * @phpstan-type MetaShape = array{
 *   channelKey: string,
 *   status: value-of<Status>,
 *   timestamp: float,
 *   usage: float,
 *   processingTime?: string|null,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * The unique key of the channel where the content was handled. Either the channel provided by you or automatically routed.
     */
    #[Required('channel_key')]
    public string $channelKey;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    #[Required]
    public float $timestamp;

    #[Required]
    public float $usage;

    #[Optional('processing_time')]
    public ?string $processingTime;

    /**
     * `new Meta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Meta::with(channelKey: ..., status: ..., timestamp: ..., usage: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Meta)
     *   ->withChannelKey(...)
     *   ->withStatus(...)
     *   ->withTimestamp(...)
     *   ->withUsage(...)
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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $channelKey,
        Status|string $status,
        float $timestamp,
        float $usage,
        ?string $processingTime = null,
    ): self {
        $self = new self;

        $self['channelKey'] = $channelKey;
        $self['status'] = $status;
        $self['timestamp'] = $timestamp;
        $self['usage'] = $usage;

        null !== $processingTime && $self['processingTime'] = $processingTime;

        return $self;
    }

    /**
     * The unique key of the channel where the content was handled. Either the channel provided by you or automatically routed.
     */
    public function withChannelKey(string $channelKey): self
    {
        $self = clone $this;
        $self['channelKey'] = $channelKey;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withTimestamp(float $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    public function withUsage(float $usage): self
    {
        $self = clone $this;
        $self['usage'] = $usage;

        return $self;
    }

    public function withProcessingTime(string $processingTime): self
    {
        $self = clone $this;
        $self['processingTime'] = $processingTime;

        return $self;
    }
}
