<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts\Wordlist;

use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\Wordlist\Words\WordAddParams;
use ModerationAPI\Wordlist\Words\WordAddResponse;
use ModerationAPI\Wordlist\Words\WordRemoveParams;
use ModerationAPI\Wordlist\Words\WordRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
interface WordsRawContract
{
    /**
     * @api
     *
     * @param string $id ID of the wordlist to add words to
     * @param array<string,mixed>|WordAddParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id ID of the wordlist to remove words from
     * @param array<string,mixed>|WordRemoveParams $params
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
    ): BaseResponse;
}
