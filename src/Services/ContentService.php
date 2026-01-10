<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Client;
use ModerationAPI\Content\ContentSubmitParams\Content\Audio;
use ModerationAPI\Content\ContentSubmitParams\Content\Image;
use ModerationAPI\Content\ContentSubmitParams\Content\Object_;
use ModerationAPI\Content\ContentSubmitParams\Content\Text;
use ModerationAPI\Content\ContentSubmitParams\Content\Video;
use ModerationAPI\Content\ContentSubmitParams\MetaType;
use ModerationAPI\Content\ContentSubmitResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Core\Util;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\ContentContract;

/**
 * @phpstan-import-type ContentShape from \ModerationAPI\Content\ContentSubmitParams\Content
 * @phpstan-import-type PolicyShape from \ModerationAPI\Content\ContentSubmitParams\Policy
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
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
     * @param ContentShape $content The content sent for moderation
     * @param string $authorID the author of the content
     * @param string $channel Provide a channel ID or key. Will use the project's default channel if not provided.
     * @param string $contentID the unique ID of the content in your database
     * @param string $conversationID For example the ID of a chat room or a post
     * @param bool $doNotStore Do not store the content. The content won't enter the review queue
     * @param array<string,mixed> $metadata Any metadata you want to store with the content
     * @param MetaType|value-of<MetaType> $metaType The meta type of content being moderated
     * @param list<PolicyShape> $policies (Enterprise) override the channel policies for this moderation request only
     * @param float $timestamp Unix timestamp (in milliseconds) of when the content was created. Use if content is not submitted in real-time.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function submit(
        Text|array|Image|Video|Audio|Object_ $content,
        ?string $authorID = null,
        ?string $channel = null,
        ?string $contentID = null,
        ?string $conversationID = null,
        ?bool $doNotStore = null,
        ?array $metadata = null,
        MetaType|string|null $metaType = null,
        ?array $policies = null,
        ?float $timestamp = null,
        RequestOptions|array|null $requestOptions = null,
    ): ContentSubmitResponse {
        $params = Util::removeNulls(
            [
                'content' => $content,
                'authorID' => $authorID,
                'channel' => $channel,
                'contentID' => $contentID,
                'conversationID' => $conversationID,
                'doNotStore' => $doNotStore,
                'metadata' => $metadata,
                'metaType' => $metaType,
                'policies' => $policies,
                'timestamp' => $timestamp,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->submit(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
