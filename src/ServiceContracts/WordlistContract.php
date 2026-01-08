<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts;

use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\Wordlist\WordlistGetEmbeddingStatusResponse;
use ModerationAPI\Wordlist\WordlistGetResponse;
use ModerationAPI\Wordlist\WordlistListResponseItem;
use ModerationAPI\Wordlist\WordlistUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
interface WordlistContract
{
    /**
     * @api
     *
     * @param string $id ID of the wordlist to get
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): WordlistGetResponse;

    /**
     * @api
     *
     * @param string $id ID of the wordlist to update
     * @param string $description New description for the wordlist
     * @param string $key New key for the wordlist
     * @param string $name New name for the wordlist
     * @param bool $strict Deprecated. Now using threshold in project settings.
     * @param list<string> $words New words for the wordlist. Replace the existing words with these new ones. Duplicate words will be ignored.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $description = null,
        ?string $key = null,
        ?string $name = null,
        ?bool $strict = null,
        ?array $words = null,
        RequestOptions|array|null $requestOptions = null,
    ): WordlistUpdateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return list<WordlistListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param string $id ID of the wordlist to check embedding status for
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEmbeddingStatus(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): WordlistGetEmbeddingStatusResponse;
}
