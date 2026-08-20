<?php

declare(strict_types=1);

namespace ModerationAPI\Content;

use ModerationAPI\Content\ContentStreamParams\SecWebSocketProtocol;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Open a WebSocket to moderate live voice/call audio in real time. Speech is transcribed and each finalized utterance is moderated by your enabled text policies; you receive a verdict per utterance as it's spoken.
 *
 * **This is a WebSocket upgrade, not a regular HTTP call.** The request body below documents the frames you *send* over the socket; the `101` response documents the events you *receive*.
 *
 * - **Auth:** `Authorization: Bearer <api_key>` on the upgrade. A missing/invalid key closes `4401`; voice not enabled on the plan/channel closes `4403`.
 * - **Subprotocol:** request `moderationapi.v1`.
 * - **Flow:** send one `start` frame, then `media` frames as audio arrives, then `stop` (or disconnect). You receive `session.started`, `utterance.final` per utterance, optional `utterance.partial`/`warning`, and `session.ended`.
 * - **Close codes:** `1000` normal · `1011` server error · `4400` bad request · `4401` auth failed · `4403` voice not enabled · `4429` concurrency limit.
 *
 * See the [Real-time voice guide](https://docs.moderationapi.com/content-moderation/real-time-voice) for the full walkthrough and code examples.
 *
 * @see ModerationAPI\Services\ContentService::stream()
 *
 * @phpstan-type ContentStreamParamsShape = array{
 *   secWebSocketProtocol: SecWebSocketProtocol|value-of<SecWebSocketProtocol>
 * }
 */
final class ContentStreamParams implements BaseModel
{
    /** @use SdkModel<ContentStreamParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<SecWebSocketProtocol> $secWebSocketProtocol */
    #[Required(enum: SecWebSocketProtocol::class)]
    public string $secWebSocketProtocol;

    /**
     * `new ContentStreamParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContentStreamParams::with(secWebSocketProtocol: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContentStreamParams)->withSecWebSocketProtocol(...)
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
     * @param SecWebSocketProtocol|value-of<SecWebSocketProtocol> $secWebSocketProtocol
     */
    public static function with(
        SecWebSocketProtocol|string $secWebSocketProtocol
    ): self {
        $self = new self;

        $self['secWebSocketProtocol'] = $secWebSocketProtocol;

        return $self;
    }

    /**
     * @param SecWebSocketProtocol|value-of<SecWebSocketProtocol> $secWebSocketProtocol
     */
    public function withSecWebSocketProtocol(
        SecWebSocketProtocol|string $secWebSocketProtocol
    ): self {
        $self = clone $this;
        $self['secWebSocketProtocol'] = $secWebSocketProtocol;

        return $self;
    }
}
