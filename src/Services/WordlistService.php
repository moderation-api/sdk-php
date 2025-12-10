<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Client;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\WordlistContract;
use ModerationAPI\Services\Wordlist\WordsService;
use ModerationAPI\Wordlist\WordlistGetEmbeddingStatusResponse;
use ModerationAPI\Wordlist\WordlistGetResponse;
use ModerationAPI\Wordlist\WordlistListResponseItem;
use ModerationAPI\Wordlist\WordlistUpdateResponse;

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
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
    ): WordlistUpdateResponse {
        $params = [
            'description' => $description,
            'key' => $key,
            'name' => $name,
            'strict' => $strict,
            'words' => $words,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all wordlists for the authenticated organization
     *
     * @return list<WordlistListResponseItem>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): array
    {
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
     *
     * @throws APIException
     */
    public function getEmbeddingStatus(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WordlistGetEmbeddingStatusResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEmbeddingStatus($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
