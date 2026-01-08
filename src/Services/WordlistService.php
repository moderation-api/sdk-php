<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Client;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Core\Util;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\WordlistContract;
use ModerationAPI\Services\Wordlist\WordsService;
use ModerationAPI\Wordlist\WordlistGetEmbeddingStatusResponse;
use ModerationAPI\Wordlist\WordlistGetResponse;
use ModerationAPI\Wordlist\WordlistListResponseItem;
use ModerationAPI\Wordlist\WordlistUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
final class WordlistService implements WordlistContract
{
    /**
     * @api
     */
    public WordlistRawService $raw;

    /**
     * @api
     */
    public WordsService $words;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WordlistRawService($client);
        $this->words = new WordsService($client);
    }

    /**
     * @api
     *
     * Get a specific wordlist by ID
     *
     * @param string $id ID of the wordlist to get
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): WordlistGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a wordlist
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
    ): WordlistUpdateResponse {
        $params = Util::removeNulls(
            [
                'description' => $description,
                'key' => $key,
                'name' => $name,
                'strict' => $strict,
                'words' => $words,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all wordlists for the authenticated organization
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return list<WordlistListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the current embedding progress status for a wordlist
     *
     * @param string $id ID of the wordlist to check embedding status for
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEmbeddingStatus(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): WordlistGetEmbeddingStatusResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEmbeddingStatus($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
