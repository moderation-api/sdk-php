<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Client;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Conversion\ListOf;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\WordlistRawContract;
use ModerationAPI\Wordlist\WordlistGetEmbeddingStatusResponse;
use ModerationAPI\Wordlist\WordlistGetResponse;
use ModerationAPI\Wordlist\WordlistListResponseItem;
use ModerationAPI\Wordlist\WordlistUpdateParams;
use ModerationAPI\Wordlist\WordlistUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
final class WordlistRawService implements WordlistRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a specific wordlist by ID
     *
     * @param string $id ID of the wordlist to get
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WordlistGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
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
     * @param string $id ID of the wordlist to update
     * @param array{
     *   description?: string,
     *   key?: string,
     *   name?: string,
     *   strict?: bool,
     *   words?: list<string>,
     * }|WordlistUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WordlistUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|WordlistUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<WordlistListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
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
     * @param string $id ID of the wordlist to check embedding status for
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WordlistGetEmbeddingStatusResponse>
     *
     * @throws APIException
     */
    public function getEmbeddingStatus(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['wordlist/%1$s/embedding-status', $id],
            options: $requestOptions,
            convert: WordlistGetEmbeddingStatusResponse::class,
        );
    }
}
