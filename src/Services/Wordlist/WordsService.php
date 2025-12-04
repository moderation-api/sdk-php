<?php

declare(strict_types=1);

namespace ModerationAPI\Services\Wordlist;

use ModerationAPI\Client;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\Wordlist\WordsContract;
use ModerationAPI\Wordlist\Words\WordAddParams;
use ModerationAPI\Wordlist\Words\WordAddResponse;
use ModerationAPI\Wordlist\Words\WordRemoveParams;
use ModerationAPI\Wordlist\Words\WordRemoveResponse;

final class WordsService implements WordsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Add words to an existing wordlist
     *
     * @param array{words: list<string>}|WordAddParams $params
     *
     * @throws APIException
     */
    public function add(
        string $id,
        array|WordAddParams $params,
        ?RequestOptions $requestOptions = null,
    ): WordAddResponse {
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
     * @param array{words: list<string>}|WordRemoveParams $params
     *
     * @throws APIException
     */
    public function remove(
        string $id,
        array|WordRemoveParams $params,
        ?RequestOptions $requestOptions = null,
    ): WordRemoveResponse {
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
