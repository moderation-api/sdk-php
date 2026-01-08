<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts\Wordlist;

use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\Wordlist\Words\WordAddResponse;
use ModerationAPI\Wordlist\Words\WordRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
interface WordsContract
{
    /**
     * @api
     *
     * @param string $id ID of the wordlist to add words to
     * @param list<string> $words Array of words to add to the wordlist. Duplicate words will be ignored.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        string $id,
        array $words,
        RequestOptions|array|null $requestOptions = null
    ): WordAddResponse;

    /**
     * @api
     *
     * @param string $id ID of the wordlist to remove words from
     * @param list<string> $words Array of words to remove from the wordlist
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        string $id,
        array $words,
        RequestOptions|array|null $requestOptions = null
    ): WordRemoveResponse;
}
