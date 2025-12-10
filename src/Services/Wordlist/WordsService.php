<?php

declare(strict_types=1);

namespace ModerationAPI\Services\Wordlist;

use ModerationAPI\Client;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\Wordlist\WordsContract;
use ModerationAPI\Wordlist\Words\WordAddResponse;
use ModerationAPI\Wordlist\Words\WordRemoveResponse;

final class WordsService implements WordsContract
{
    /**
     * @api
     */
    public WordsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WordsRawService($client);
    }

    /**
     * @api
     *
     * Add words to an existing wordlist
     *
     * @param string $id ID of the wordlist to add words to
     * @param list<string> $words Array of words to add to the wordlist. Duplicate words will be ignored.
     *
     * @throws APIException
     */
    public function add(
        string $id,
        array $words,
        ?RequestOptions $requestOptions = null
    ): WordAddResponse {
        $params = ['words' => $words];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->add($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove words from an existing wordlist
     *
     * @param string $id ID of the wordlist to remove words from
     * @param list<string> $words Array of words to remove from the wordlist
     *
     * @throws APIException
     */
    public function remove(
        string $id,
        array $words,
        ?RequestOptions $requestOptions = null
    ): WordRemoveResponse {
        $params = ['words' => $words];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->remove($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
