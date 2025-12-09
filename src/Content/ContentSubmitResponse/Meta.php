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
 *   channel_key: string,
 *   status: value-of<Status>,
 *   timestamp: float,
 *   usage: float,
 *   processing_time?: string|null,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * The unique key of the channel where the content was handled. Either the channel provided by you or automatically routed.
     */
    #[Required]
    public string $channel_key;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    #[Required]
    public float $timestamp;

    #[Required]
    public float $usage;

    #[Optional]
    public ?string $processing_time;

    /**
     * `new Meta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Meta::with(channel_key: ..., status: ..., timestamp: ..., usage: ...)
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
        string $channel_key,
        Status|string $status,
        float $timestamp,
        float $usage,
        ?string $processing_time = null,
    ): self {
        $obj = new self;

        $obj['channel_key'] = $channel_key;
        $obj['status'] = $status;
        $obj['timestamp'] = $timestamp;
        $obj['usage'] = $usage;

        null !== $processing_time && $obj['processing_time'] = $processing_time;

        return $obj;
    }

    /**
     * The unique key of the channel where the content was handled. Either the channel provided by you or automatically routed.
     */
    public function withChannelKey(string $channelKey): self
    {
        $obj = clone $this;
        $obj['channel_key'] = $channelKey;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withTimestamp(float $timestamp): self
    {
        $obj = clone $this;
        $obj['timestamp'] = $timestamp;

        return $obj;
    }

    public function withUsage(float $usage): self
    {
        $obj = clone $this;
        $obj['usage'] = $usage;

        return $obj;
    }

    public function withProcessingTime(string $processingTime): self
    {
        $obj = clone $this;
        $obj['processing_time'] = $processingTime;

        return $obj;
    }
}
