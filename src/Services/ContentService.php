<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Client;
use ModerationAPI\Content\ContentSubmitParams;
use ModerationAPI\Content\ContentSubmitResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\ContentContract;

final class ContentService implements ContentContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   content: array<string,mixed>,
     *   authorId?: string,
     *   channel?: string,
     *   contentId?: string,
     *   conversationId?: string,
     *   doNotStore?: bool,
     *   metadata?: array<string,mixed>,
     *   metaType?: 'profile'|'message'|'post'|'comment'|'event'|'product'|'review'|'other',
     *   policies?: list<array<string,mixed>>,
     * }|ContentSubmitParams $params
     *
     * @throws APIException
     */
    public function submit(
        array|ContentSubmitParams $params,
        ?RequestOptions $requestOptions = null
    ): ContentSubmitResponse {
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
