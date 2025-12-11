<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts;

use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\Wordlist\WordlistGetEmbeddingStatusResponse;
use ModerationAPI\Wordlist\WordlistGetResponse;
use ModerationAPI\Wordlist\WordlistListResponseItem;
use ModerationAPI\Wordlist\WordlistUpdateResponse;

interface WordlistContract
{
    /**
     * @api
     *
     * @param string $id ID of the wordlist to get
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
        ?RequestOptions $requestOptions = null,
    ): WordlistUpdateResponse;

    /**
     * @api
     *
     * @return list<WordlistListResponseItem>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): array;

    /**
     * @api
     *
     * @param string $id ID of the wordlist to check embedding status for
     *
     * @throws APIException
     */
    public function getEmbeddingStatus(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WordlistGetEmbeddingStatusResponse;
}
