<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts\Wordlist;

use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\Wordlist\Words\WordAddParams;
use ModerationAPI\Wordlist\Words\WordAddResponse;
use ModerationAPI\Wordlist\Words\WordRemoveParams;
use ModerationAPI\Wordlist\Words\WordRemoveResponse;

interface WordsContract
{
    /**
     * @api
     *
     * @param array<mixed>|WordAddParams $params
     *
     * @throws APIException
     */
    public function add(
        string $id,
        array|WordAddParams $params,
        ?RequestOptions $requestOptions = null,
    ): WordAddResponse;

    /**
     * @api
     *
     * @param array<mixed>|WordRemoveParams $params
     *
     * @throws APIException
     */
    public function remove(
        string $id,
        array|WordRemoveParams $params,
        ?RequestOptions $requestOptions = null,
    ): WordRemoveResponse;
}
