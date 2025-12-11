<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts\Wordlist;

use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\Wordlist\Words\WordAddResponse;
use ModerationAPI\Wordlist\Words\WordRemoveResponse;

interface WordsContract
{
    /**
     * @api
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
    ): WordAddResponse;

    /**
     * @api
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
    ): WordRemoveResponse;
}
