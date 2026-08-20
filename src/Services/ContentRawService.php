<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Client;
use ModerationAPI\Content\ContentStreamParams;
use ModerationAPI\Content\ContentStreamParams\SecWebSocketProtocol;
use ModerationAPI\Content\ContentSubmitParams;
use ModerationAPI\Content\ContentSubmitParams\ClientAction;
use ModerationAPI\Content\ContentSubmitParams\MetaType;
use ModerationAPI\Content\ContentSubmitResponse;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Core\Util;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\ContentRawContract;

/**
 * @phpstan-import-type ContentShape from \ModerationAPI\Content\ContentSubmitParams\Content
 * @phpstan-import-type ClientActionShape from \ModerationAPI\Content\ContentSubmitParams\ClientAction
 * @phpstan-import-type PolicyShape from \ModerationAPI\Content\ContentSubmitParams\Policy
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
final class ContentRawService implements ContentRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
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
     * @param array{
     *   secWebSocketProtocol: SecWebSocketProtocol|value-of<SecWebSocketProtocol>
     * }|ContentStreamParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function stream(
        array|ContentStreamParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ContentStreamParams::parseRequest(
            $params,
            $requestOptions,
        );
        $path = $this
            ->client
            ->baseUrlOverridden ? 'stream' : 'wss://voice.moderationapi.com/v1/stream';

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: $path,
            headers: Util::array_transform_keys(
                $parsed,
                ['secWebSocketProtocol' => 'Sec-WebSocket-Protocol']
            ),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   content: ContentShape,
     *   authorID?: string,
     *   channel?: string,
     *   clientAction?: ClientAction|ClientActionShape,
     *   contentID?: string,
     *   conversationID?: string,
     *   doNotStore?: bool,
     *   metadata?: array<string,mixed>,
     *   metaType?: value-of<MetaType>,
     *   policies?: list<PolicyShape>,
     *   timestamp?: float,
     * }|ContentSubmitParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentSubmitResponse>
     *
     * @throws APIException
     */
    public function submit(
        array|ContentSubmitParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ContentSubmitParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'moderate',
            body: (object) $parsed,
            options: $options,
            convert: ContentSubmitResponse::class,
        );
    }
}
