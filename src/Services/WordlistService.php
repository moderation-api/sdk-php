<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Client;
use ModerationAPI\Core\Conversion\ListOf;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\WordlistContract;
use ModerationAPI\Services\Wordlist\WordsService;
use ModerationAPI\Wordlist\WordlistGetEmbeddingStatusResponse;
use ModerationAPI\Wordlist\WordlistGetResponse;
use ModerationAPI\Wordlist\WordlistListResponseItem;
use ModerationAPI\Wordlist\WordlistUpdateParams;
use ModerationAPI\Wordlist\WordlistUpdateResponse;

final class WordlistService implements WordlistContract
{
    /**
     * @api
     */
    public WordsService $words;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->words = new WordsService($client);
    }

    /**
     * @api
     *
     * Get a specific wordlist by ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WordlistGetResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['wordlist/%1$s', $id],
            options: $requestOptions,
            convert: WordlistGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a wordlist
     *
     * @param array{
     *   description?: string,
     *   key?: string,
     *   name?: string,
     *   strict?: bool,
     *   words?: list<string>,
     * }|WordlistUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|WordlistUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): WordlistUpdateResponse {
        [$parsed, $options] = WordlistUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['wordlist/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: WordlistUpdateResponse::class,
        );
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
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'wordlist',
            options: $requestOptions,
            convert: new ListOf(WordlistListResponseItem::class),
        );
    }

    /**
     * @api
     *
     * Get the current embedding progress status for a wordlist
     *
     * @throws APIException
     */
    public function getEmbeddingStatus(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WordlistGetEmbeddingStatusResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['wordlist/%1$s/embedding-status', $id],
            options: $requestOptions,
            convert: WordlistGetEmbeddingStatusResponse::class,
        );
    }
}
