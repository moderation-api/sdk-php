<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Client;
use ModerationAPI\Content\ContentSubmitParams\MetaType;
use ModerationAPI\Content\ContentSubmitResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\ContentContract;

final class ContentService implements ContentContract
{
    /**
     * @api
     */
    public ContentRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ContentRawService($client);
    }

    /**
     * @api
     *
     * @param array<string,mixed> $content The content sent for moderation
     * @param string $authorID the author of the content
     * @param string $channel Provide a channel ID or key. Will use the project's default channel if not provided.
     * @param string $contentID the unique ID of the content in your database
     * @param string $conversationID For example the ID of a chat room or a post
     * @param bool $doNotStore Do not store the content. The content won't enter the review queue
     * @param array<string,mixed> $metadata Any metadata you want to store with the content
     * @param 'profile'|'message'|'post'|'comment'|'event'|'product'|'review'|'other'|MetaType $metaType The meta type of content being moderated
     * @param list<array<string,mixed>> $policies (Enterprise) override the channel policies for this moderation request only
     *
     * @throws APIException
     */
    public function submit(
        array $content,
        ?string $authorID = null,
        ?string $channel = null,
        ?string $contentID = null,
        ?string $conversationID = null,
        ?bool $doNotStore = null,
        ?array $metadata = null,
        string|MetaType|null $metaType = null,
        ?array $policies = null,
        ?RequestOptions $requestOptions = null,
    ): ContentSubmitResponse {
        $params = [
            'content' => $content,
            'authorID' => $authorID,
            'channel' => $channel,
            'contentID' => $contentID,
            'conversationID' => $conversationID,
            'doNotStore' => $doNotStore,
            'metadata' => $metadata,
            'metaType' => $metaType,
            'policies' => $policies,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->submit(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
