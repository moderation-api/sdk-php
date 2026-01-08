<?php

declare(strict_types=1);

namespace ModerationAPI\Services\Wordlist;

use ModerationAPI\Client;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\Wordlist\WordsRawContract;
use ModerationAPI\Wordlist\Words\WordAddParams;
use ModerationAPI\Wordlist\Words\WordAddResponse;
use ModerationAPI\Wordlist\Words\WordRemoveParams;
use ModerationAPI\Wordlist\Words\WordRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
final class WordsRawService implements WordsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Add words to an existing wordlist
     *
     * @param string $id ID of the wordlist to add words to
     * @param array{words: list<string>}|WordAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WordAddResponse>
     *
     * @throws APIException
     */
    public function add(
        string $id,
        array|WordAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WordAddParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['wordlist/%1$s/words', $id],
            body: (object) $parsed,
            options: $options,
            convert: WordAddResponse::class,
        );
    }

    /**
     * @api
     *
     * Remove words from an existing wordlist
     *
     * @param string $id ID of the wordlist to remove words from
     * @param array{words: list<string>}|WordRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WordRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        string $id,
        array|WordRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WordRemoveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['wordlist/%1$s/words', $id],
            query: $parsed,
            options: $options,
            convert: WordRemoveResponse::class,
        );
    }
}
