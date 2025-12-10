<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Client;
use ModerationAPI\Content\ContentSubmitParams;
use ModerationAPI\Content\ContentSubmitParams\MetaType;
use ModerationAPI\Content\ContentSubmitResponse;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\ContentRawContract;

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
     * @param array{
     *   content: array<string,mixed>,
     *   authorID?: string,
     *   channel?: string,
     *   contentID?: string,
     *   conversationID?: string,
     *   doNotStore?: bool,
     *   metadata?: array<string,mixed>,
     *   metaType?: 'profile'|'message'|'post'|'comment'|'event'|'product'|'review'|'other'|MetaType,
     *   policies?: list<array<string,mixed>>,
     * }|ContentSubmitParams $params
     *
     * @return BaseResponse<ContentSubmitResponse>
     *
     * @throws APIException
     */
    public function submit(
        array|ContentSubmitParams $params,
        ?RequestOptions $requestOptions = null
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
